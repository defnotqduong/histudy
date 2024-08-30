<?php

use App\Http\Controllers\AttachmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
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

// Auth Routes
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Category Routes
Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'getAllCategory']);
});

// Public Course Routes
Route::group(['prefix' => 'course'], function () {
    Route::get('/search', [CourseController::class, 'searchCourses']);
    Route::get('/popular', [CourseController::class, 'getPopularCourses']);
    Route::get('/{slug}', [CourseController::class, 'getCourseForGuest']);
});


// Instructor Routes
Route::group(['prefix' => 'instructor', 'middleware' => 'auth:api'], function () {
    // Course Routes
    Route::group(['prefix' => 'course'], function () {
        Route::post('/', [CourseController::class, 'createCourse']);
        Route::get('/{slug}', [CourseController::class, 'getCourse']);
        Route::patch('/{slug}', [CourseController::class, 'updateCourse']);
        Route::patch('/{slug}/publish', [CourseController::class, 'publishCourse']);
        Route::patch('/{slug}/unpublish', [CourseController::class, 'unpublishCourse']);
        Route::delete('/{slug}', [CourseController::class, 'deleteCourse']);

        // Thumbnail
        Route::post('/{slug}/thumbnail', [CourseController::class, 'updateCourseThumbnail']);
    });

    // Chapter Routes
    Route::group(['prefix' => 'course/{slug}/chapter'], function () {
        Route::post('/', [ChapterController::class, 'createChapter']);
        Route::get('/{id}', [ChapterController::class, 'getChapter']);
        Route::patch('/{id}', [ChapterController::class, 'updateChapter']);
        Route::patch('/{id}/publish', [ChapterController::class, 'publishChapter']);
        Route::patch('/{id}/unpublish', [ChapterController::class, 'unpublishChapter']);
        Route::put('/reorder', [ChapterController::class, 'reorderChapter']);
        Route::delete('/{id}', [ChapterController::class, 'deleteChapter']);

        // Lesson Routes
        Route::group(['prefix' => '{chapterId}/lesson'], function () {
            Route::post('/', [LessonController::class, 'createLesson']);
            Route::get('/{id}', [LessonController::class, 'getLesson']);
            Route::patch('/{id}', [LessonController::class, 'updateLesson']);
            Route::post('/{id}/video', [LessonController::class, 'uploadLessonVideo']);
            Route::patch('/{id}/publish', [LessonController::class, 'publishLesson']);
            Route::patch('/{id}/unpublish', [LessonController::class, 'unpublishLesson']);
            Route::put('/reorder', [LessonController::class, 'reorderLesson']);
            Route::delete('/{id}', [LessonController::class, 'deleteLesson']);

            // Attachment Routes
            Route::group(['prefix' => '{lessonId}/attachment'], function () {
                Route::post('/', [AttachmentController::class, 'createLessonAttachment']);
                Route::delete('/{id}', [AttachmentController::class, 'deleteLessonAttachment']);
            });
        });
    });
});
