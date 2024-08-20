<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachmentRequest;
use App\Models\Attachment;
use App\Models\Course;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttachmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    public function createCourseAttachment(AttachmentRequest $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        if ($request->hasFile('attachment')) {
            $cloudinaryFile = Cloudinary::uploadFile($request->file('attachment')->getRealPath(), [
                'folder' => 'files',
            ]);

            $url = $cloudinaryFile->getSecurePath();
            $publicId = $cloudinaryFile->getPublicId();
            $name = $request->file('attachment')->getClientOriginalName();

            $data = [
                'name' => $name,
                'url' => $url,
                'attachment_public_id' => $publicId,
                'course_id' => $course->id,
            ];

            Attachment::createAttachment($data);
        }

        return response()->json(['success' => true, 'message' => 'Attachment added successfully'], 200);
    }

    public function deleteCourseAttachment(Request $request, $slug, $id)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        $attachment = Attachment::where('id', $id)
            ->where('course_id', $course->id)
            ->first();

        if (!$attachment) {
            return response()->json(['success' => false, 'error' => 'Attachment not found'], 404);
        }

        Cloudinary::destroy($attachment->attachment_public_id);

        $attachment->deleteAttachment();

        return response()->json(['success' => true, 'message' => 'Attachment deleted successfully'], 200);
    }
}
