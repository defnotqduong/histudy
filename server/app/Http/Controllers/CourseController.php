<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Resources\ChapterResource;
use App\Http\Resources\ChapterResourceCollection;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseResourceCollection;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\UserResource;
use App\Models\Attachment;
use App\Models\Course;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            'auth:api',
            ['except' => [
                'getPopularCourses',
                'getCourseForGuest',
                'searchCourses'
            ]]
        );
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
            'courses' => CourseResource::collection($courses)
        ], 200);
    }

    public function getCourse(Request $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }


        return response()->json([
            'success' => true,
            'message' => 'Course found',
            'course' => new CourseResource($course),
            'chapters' => new ChapterResourceCollection($course->chapters)
        ], 200);
    }

    public function getCourseForGuest(Request $request, $slug)
    {
        $course = Course::findBySlug($slug);

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
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
            ->limit(3)
            ->get();

        $relatedCourses = Course::where('category_id', $course->category_id)
            ->where('is_published', true)
            ->where('id', '!=', $course->id)
            ->limit(3)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Course found',
            'course' => new CourseResource($course),
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
            'relatedCourses' => new CourseResourceCollection($relatedCourses, false)
        ], 200);
    }

    public function searchCourses(Request $request)
    {
        $keyword = $request->input('keyword');

        if (empty($keyword)) {
            return response()->json(['success' => false, 'error' => 'Keyword is required'], 400);
        }

        $courses = Course::where('title', 'LIKE', '%' . $keyword . '%')
            ->orWhere('summary', 'LIKE', '%' . $keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $keyword . '%')
            ->where('is_published', true)
            ->get();

        return response()->json([
            'success' => true,
            'courses' => new CourseResourceCollection($courses),
        ], 200);
    }

    public function updateCourse(CourseRequest $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
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
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        if ($request->hasFile('image')) {

            $cloudinaryImage = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'images'
            ]);

            $url = $cloudinaryImage->getSecurePath();
            $publicId  = $cloudinaryImage->getPublicId();

            if ($course->thumbnail_url) {
                Cloudinary::destroy($course->thumbnail_public_id);
            }

            $course->updateCourse([
                'thumbnail_url' => $url,
                'thumbnail_public_id' => $publicId
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Course updated successfully', 'course' => new CourseResource($course)], 200);
    }

    public function publishCourse(Request $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
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
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
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
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        if ($course->thumbnail_public_id) {
            Cloudinary::destroy($course->thumbnail_public_id);
        }

        foreach ($course->chapters as $chapter) {

            foreach ($chapter->lessons as $lesson) {

                if ($lesson->video_public_id) {
                    Cloudinary::destroy($lesson->video_public_id, [
                        'resource_type' => 'video'
                    ]);
                }

                foreach ($lesson->attachments as $attachment) {
                    if ($attachment->attachment_public_id) {
                        Cloudinary::destroy($attachment->attachment_public_id);
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
