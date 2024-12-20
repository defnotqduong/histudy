<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Resources\CertificateTemplateResource;
use App\Http\Resources\ChapterResourceCollection;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseResourceCollection;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\UserResource;
use App\Models\CertificateTemplate;
use App\Models\Course;
use App\Services\UploadService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->middleware(
            'auth:api',
            ['except' => [
                'getAllCourses',
                'getPopularCourses',
                'getCourseForGuest',
                'searchCourses'
            ]]
        );

        $this->middleware(['role:instructor'], [
            'only' => [
                'createCourse',
                'getAuthoredCourses',
                'getCourse',
                'updateCourse',
                'updateCourseThumbnail',
                'uploadCertificateTemplate',
                'publishCourse',
                'unpublishCourse',
                'deleteCourse'
            ]
        ]);

        $this->uploadService = $uploadService;
    }



    public function createCourse(CourseRequest $request)
    {
        $validatedData = $request->validated();

        $course = Course::createCourse($validatedData);

        return response()->json(['success' => true, 'message' => 'Course created Successfully', 'course' => new CourseResource($course)], 200);
    }

    public function getPopularCourses(Request $request)
    {
        $courses = Course::getPopularCourses();

        return response()->json([
            'success' => true,
            'message' => 'Get popular Courses successfully',
            'courses' => new CourseResourceCollection($courses, false)
        ], 200);
    }

    public function getAuthoredCourses()
    {
        $user = Auth::user();

        return response()->json(
            [
                'success' => true,
                'courses' => new CourseResourceCollection($user->instructorCourses),
            ],
            200
        );
    }

    public function getPurchasedCourses()
    {
        $user = Auth::user();

        return response()->json(
            [
                'success' => true,
                'courses' =>  new CourseResourceCollection($user->purchasedCourses, false),
            ],
            200
        );
    }

    public function getAllCourses(Request $request)
    {
        $courses = Course::where('is_published', true)
            ->when(!empty($request['category_id']), function ($query) use ($request) {
                $query->where('category_id', $request['category_id']);
            })
            ->when(!empty($request['price']), function ($query) use ($request) {
                if ($request['price'] === 'free') {
                    $query->where('price', 0);
                } else if ($request['price'] === 'paid') {
                    $query->where('price', '>', 0);
                }
            })
            ->when(!empty($request['search']), function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'like', '%' . $request['search'] . '%')
                        ->orWhere('summary', 'like', '%' . $request['search'] . '%')
                        ->orWhere('description', 'like', '%' . $request['search'] . '%')
                        ->orWhereHas('instructor', function ($q) use ($request) {
                            $q->where('name', 'like', '%' . $request['search'] . '%');
                        });
                });
            })
            ->when(!empty($request['sort']), function ($query) use ($request) {
                switch ($request['sort']) {
                    case 'latest':
                        $query->orderBy('created_at', 'desc');
                        break;
                    case 'price_asc':
                        $query->orderBy('price', 'asc');
                        break;
                    case 'price_desc':
                        $query->orderBy('price', 'desc');
                        break;
                    case 'popular':
                        $query->leftJoin('purchases', 'courses.id', '=', 'purchases.course_id')
                            ->groupBy('courses.id')
                            ->orderByRaw('COUNT(purchases.id) DESC');
                        break;
                    default:
                        $query->orderBy('created_at', 'desc');
                        break;
                }
            })
            ->paginate($request->input('limit', 9));

        return response()->json([
            'success' => true,
            'message' => 'Get courses successfully',
            'courses' => new CourseResourceCollection($courses, false)
        ], 200);
    }

    public function getCourse(Request $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }


        return response()->json([
            'success' => true,
            'message' => 'Course found',
            'course' => new CourseResource($course),
            'chapters' => new ChapterResourceCollection($course->chapters),
            'cert' => $course->certificateTemplate ? new CertificateTemplateResource($course->certificateTemplate) : null
        ], 200);
    }

    public function getCourseForGuest(Request $request, $slug)
    {
        $course = Course::findBySlug($slug);

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $instructor = $course->instructor;

        $publishedCoursesCount = Course::where('instructor_id', $instructor->id)
            ->where('is_published', true)
            ->count();

        $totalCustomers = Course::where('instructor_id', $instructor->id)
            ->where('is_published', true)
            ->withCount('customers')
            ->get()
            ->sum('customers_count');

        $totalReviews = Course::where('instructor_id', $instructor->id)
            ->where('is_published', true)
            ->withCount('reviews')
            ->get()
            ->sum('reviews_count');

        $averageRating = Course::where('instructor_id', $instructor->id)
            ->where('is_published', true)
            ->whereHas('reviews')
            ->with('reviews')
            ->get()
            ->flatMap(function ($course) {
                return $course->reviews;
            })
            ->avg('rating');

        $instructorCourses = Course::where('instructor_id', $instructor->id)
            ->where('is_published', true)
            ->where('id', '!=', $course->id)
            ->limit(2)
            ->get();

        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('is_published', true)
            ->where('id', '!=', $course->id)
            ->limit(3)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Course found',
            'course' => new CourseResource($course, false),
            'instructor' => [
                'info' => new UserResource($instructor),
                'published_courses_count' => $publishedCoursesCount,
                'total_customers' => $totalCustomers,
                'total_reviews' => $totalReviews,
                'average_rating' => round($averageRating, 2),
            ],
            'chapters' => new ChapterResourceCollection($course->publishedChapters, false),
            'reviews' => ReviewResource::collection($course->reviews),
            'instructorCourses' => new CourseResourceCollection($instructorCourses, false),
            'relatedCourses' => new CourseResourceCollection($relatedCourses, false),
            'cert' => $course->certificateTemplate ?  new CertificateTemplateResource($course->certificateTemplate) : null
        ], 200);
    }


    public function searchCourses(Request $request)
    {
        $keyword = $request->input('keyword');

        if (empty($keyword)) {
            return response()->json(['success' => false, 'message' => 'Keyword is required'], 400);
        }

        $courses = Course::where('is_published', true)
            ->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('summary', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('description', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('instructor', function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', '%' . $keyword . '%');
                    });
            })
            ->get();

        return response()->json([
            'success' => true,
            'courses' => new CourseResourceCollection($courses, false),
        ], 200);
    }

    public function updateCourse(CourseRequest $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $course->updateCourse($request->all());

        return response()->json(['success' => true, 'message' => 'Course updated successfully', 'course' => new CourseResource($course)], 200);
    }

    public function updateCourseThumbnail(ImageRequest $request, $slug)
    {

        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $uploadResult = $this->uploadService->multipartUploaderToS3('images', $file);

            if ($uploadResult['status']) {

                if ($course->thumbnail_url) {
                    $this->uploadService->deleteObjectS3($course->thumbnail_url);
                }

                $course->updateCourse([
                    'thumbnail_url' => $uploadResult['filePath'],
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Course updated successfully',
                    'course' => new CourseResource($course)
                ], 200);
            }
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image.',
            ], 500);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded.',
        ], 400);
    }

    public function uploadCertificateTemplate(Request $request, $slug)
    {
        $request->validate([
            'file' => 'required|image|max:4096',
        ]);

        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found or access denied'], 404);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $uploadResult = $this->uploadService->multipartUploaderToS3('certificate-templates', $file);

            if ($uploadResult['status']) {

                if ($course->certificateTemplate) {
                    $this->uploadService->deleteObjectS3($course->certificateTemplate->template_url);
                }

                $certificateTemplate = CertificateTemplate::updateOrCreate(
                    ['course_id' => $course->id],
                    ['template_url' => $uploadResult['filePath']]
                );

                return response()->json([
                    'success' => true,
                    'message' => 'Certificate template uploaded successfully',
                    'template' => new CertificateTemplateResource($certificateTemplate),
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to upload the certificate template.',
            ], 500);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded.',
        ], 400);
    }


    public function publishCourse(Request $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $hasPublishedChapter = $course->chapters->contains('is_published', true);

        if (!$course->title || !$course->summary || !$course->description || !$course->thumbnail_url || !$course->category_id || ($course->price === null && $course->price !== 0)  || !$hasPublishedChapter) {
            return response()->json(['success' => false, 'message' => 'Missing required fields'], 400);
        }


        $course->updateCourse([
            'is_published' => true
        ]);

        return response()->json(['success' => true, 'message' => 'Course published successfully'], 200);
    }

    public function unpublishCourse(Request $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $course->updateCourse([
            'is_published' => false
        ]);

        return response()->json(['success' => true, 'message' => 'Course unpublished successfully'], 200);
    }

    public function deleteCourse(Request $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        if ($course->thumbnail_url) {
            $this->uploadService->deleteObjectS3($course->thumbnail_url);
        }

        foreach ($course->chapters as $chapter) {

            foreach ($chapter->lessons as $lesson) {

                if ($lesson->video_url) {
                    $this->uploadService->deleteObjectS3($lesson->video_url);
                }

                foreach ($lesson->attachments as $attachment) {
                    if ($attachment->attachment_url) {
                        $this->uploadService->deleteObjectS3($attachment->attachment_url);
                    }

                    $attachment->deleteAttachment();
                }

                $lesson->deleteLesson();
            }

            $chapter->deleteChapter();
        }

        $course->deleteCourse();

        return response()->json(['success' => true, 'message' => 'Course deleted successfully'], 200);
    }
}
