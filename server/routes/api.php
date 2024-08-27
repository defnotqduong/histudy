<?php

use App\Http\Controllers\AttachmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
use App\Models\Chapter;
use App\Models\Course;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Auth

Route::group(['prefix' => 'auth', 'middleware' => 'api'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Category
Route::group(['prefix' => 'category', 'middleware' => 'api'], function () {
    Route::get('/', [CategoryController::class, 'getAllCategory']);
});

// Course 
// Guest Routes

Route::group(['prefix' => 'course'], function () {
    Route::get('/popular', [CourseController::class, 'getPopularCourses']);
    Route::get('/{slug}', [CourseController::class, 'getCourseForGuest']);
});

// Protected Routes

Route::group(['prefix' => 'instructor', 'middleware' => 'api'], function () {

    Route::group(['prefix' => 'course'], function () {

        // Course
        Route::post('/', [CourseController::class, 'createCourse']);
        Route::get('/{slug}', [CourseController::class, 'getCourse']);
        Route::patch('/{slug}', [CourseController::class, 'updateCourse']);
        Route::patch('/{slug}/publish', [CourseController::class, 'publishCourse']);
        Route::patch('/{slug}/unpublish', [CourseController::class, 'unpublishCourse']);
        Route::delete('/{slug}', [CourseController::class, 'deleteCourse']);

        // Thumbnail
        Route::post('/{slug}/thumbnail', [CourseController::class, 'updateCourseThumbnail']);

        // Chapter
        Route::post('/{slug}/chapter', [ChapterController::class, 'createCourseChapter']);
        Route::get('/{slug}/chapter/{id}', [ChapterController::class, 'getCourseChapter']);
        Route::patch('/{slug}/chapter/{id}', [ChapterController::class, 'updateCourseChapter']);
        Route::post('/{slug}/chapter/{id}/video', [ChapterController::class, 'uploadChapterVideo']);
        Route::patch('/{slug}/chapter/{id}/publish', [ChapterController::class, 'publishCourseChapter']);
        Route::patch('/{slug}/chapter/{id}/unpublish', [ChapterController::class, 'unpublishCourseChapter']);
        Route::put('/{slug}/chapter/reorder', [ChapterController::class, 'reorderCourseChapter']);
        Route::delete('/{slug}/chapter/{id}', [ChapterController::class, 'deleteCourseChapter']);

        // Attachment
        Route::post('/{slug}/attachment', [AttachmentController::class, 'createCourseAttachment']);
        Route::delete('/{slug}/attachment/{id}', [AttachmentController::class, 'deleteCourseAttachment']);
    });
});
