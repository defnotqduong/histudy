<?php

use App\Http\Controllers\AttachmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
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
    Route::post('/google', [AuthController::class, 'loginWithGoogle']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::patch('/update-profile', [ProfileController::class, 'updateProfile']);
    Route::post('/update-avatar', [ProfileController::class, 'updateAvatar']);
    Route::post('/change-password', [PasswordController::class, 'changePassword']);
    Route::post('/forgot-password', [PasswordController::class, 'forgotPassword']);
    Route::post('/check-password-reset-token', [PasswordController::class, 'checkPasswordResetToken']);
    Route::post('/reset-password', [PasswordController::class, 'resetPassword']);
    Route::post('/send-verify-mail/{email}', [VerificationController::class, 'sendVerifyMail']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Category Routes
Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'getAllCategory']);
});

// Public Course Routes
Route::group(['prefix' => 'course'], function () {
    Route::get('/', [CourseController::class, 'getAllCourses']);
    Route::get('/search', [CourseController::class, 'searchCourses']);
    Route::get('/popular', [CourseController::class, 'getPopularCourses']);
    Route::get('/authored', [CourseController::class, 'getAuthoredCourses']);
    Route::get('/purchased', [CourseController::class, 'getPurchasedCourses']);
    Route::get('/{slug}', [CourseController::class, 'getCourseForGuest']);
});

// Cart Routes
Route::group(['prefix' => 'cart', 'middleware' => 'auth:api'], function () {
    Route::get('/', [CartController::class, 'getCart']);
    Route::post('/', [CartController::class, 'addCourseToCart']);
    Route::delete('/{courseId}', [CartController::class, 'removeCourseFromCart']);
});

// Wishlist Routes
Route::group(['prefix' => 'wishlist', 'middleware' => 'auth:api'], function () {
    Route::get('/', [WishlistController::class, 'getWishlist']);
    Route::post('/', [WishlistController::class, 'addCourseToWishlist']);
    Route::delete('/{courseId}', [WishlistController::class, 'removeCourseFromWishlist']);
});

// Checkout Routes
Route::group(['prefix' => 'checkout', 'middleware' => 'auth:api'], function () {
    Route::get('/course/{id}', [OrderController::class, 'getCourseForCheckout']);
    Route::post('/course/{id}', [OrderController::class, 'checkoutCourse']);
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


// Learning Routes
Route::group(['prefix' => 'learning', 'middleware' => 'auth:api'], function () {
    Route::get('/learning-info/{slug}', [LearningController::class, 'getLearningInfo']);
    Route::get('/lesson-info/{lessonId}', [LearningController::class, 'getLessonInfo']);
    Route::post('/lesson/update-completed', [LearningController::class, 'updateCompletedLesson']);
    Route::get('/free/lesson-video/{lessonId}', [LearningController::class, 'getFreeLessonVideoUrl']);
    Route::get('/attachment/get-signed-url/{attachmentId}', [LearningController::class, 'getAttachmentSignedUrl']);
});
