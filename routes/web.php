<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportFeedbackController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\GuidesController;
use App\Http\Controllers\AssessmentHistoryController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SearchLibraryController;

// Public routes
Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Password Reset Routes
Route::get('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('/reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'reset'])->name('password.update');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected routes (require authentication)
Route::middleware(['auth'])->group(function () {
    // Student Routes
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    Route::get('/message', [MessageController::class, 'index'])->name('message');
    Route::post('/message/send', [MessageController::class, 'send'])->name('message.send');
    Route::post('/message/{id}/read', [MessageController::class, 'markAsRead'])->name('message.read');
    Route::delete('/message/{id}/delete', [MessageController::class, 'delete'])->name('message.delete');
    Route::get('/message/unread-count', [MessageController::class, 'getUnreadCount'])->name('message.unread.count');

    Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
    Route::get('/reportfeedback', [ReportFeedbackController::class, 'index'])->name('reportfeedback');

    Route::get('/practicemode', function () {
        return view('practicemode');
    })->name('practicemode');

    Route::get('/guides', [GuidesController::class, 'index'])->name('guides');

    Route::get('/assessmenthistory', [AssessmentHistoryController::class, 'index'])->name('assessmenthistory');

    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');

    Route::get('/searchlibrary', [SearchLibraryController::class, 'index'])->name('searchlibrary');
});