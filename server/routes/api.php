<?php

use App\Http\Controllers\AttachmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
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


// Course 

Route::group(['prefix' => 'course', 'middleware' => 'api'], function () {
    Route::post('/', [CourseController::class, 'createCourse']);
    Route::get('/{slug}', [CourseController::class, 'getCourse']);
    Route::patch('/{slug}', [CourseController::class, 'updateCourse']);

    // Thumbnail
    Route::post('/{slug}/thumbnail', [CourseController::class, 'updateCourseThumbnail']);

    // Chapter
    Route::post('/{slug}/chapter', [ChapterController::class, 'createCourseChapter']);
    Route::get('/{slug}/chapter/{id}', [ChapterController::class, 'getCourseChapter']);
    Route::patch('/{slug}/chapter/{id}', [ChapterController::class, 'updateCourseChapter']);
    Route::post('/{slug}/chapter/{id}/video', [ChapterController::class, 'uploadChapterVideo']);
    Route::put('/{slug}/chapter/reorder', [ChapterController::class, 'reorderCourseChapter']);
    Route::delete('/{slug}/chapter/{id}', [ChapterController::class, 'deleteCourseChapter']);

    // Attachment
    Route::post('/{slug}/attachment', [AttachmentController::class, 'createCourseAttachment']);
    Route::delete('/{slug}/attachment/{id}', [AttachmentController::class, 'deleteCourseAttachment']);
});


// Category

Route::group(['prefix' => 'category', 'middleware' => 'api'], function () {
    Route::get('/', [CategoryController::class, 'getAllCategory']);
});
