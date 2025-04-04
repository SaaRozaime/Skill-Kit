<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

// Public routes
Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Password Reset Routes
Route::get('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'reset'])->name('password.update');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    Route::get('/account', function () {
        return view('account');
    })->name('account');

    Route::get('/message', function () {
        return view('message');
    })->name('message');

    Route::get('/aboutus', function () {
        return view('aboutus');
    })->name('aboutus');

    Route::get('/practicemode', function () {
        return view('practicemode');
    })->name('practicemode');

    Route::get('/guides', function () {
        return view('guides');
    })->name('guides');

    Route::get('/assessmenthistory', function () {
        return view('assessmenthistory');
    })->name('assessmenthistory');

    Route::get('/reportfeedback', function () {
        return view('reportfeedback');
    })->name('reportfeedback');

    Route::get('/schedule', function () {
        return view('schedule');
    })->name('schedule');

    Route::get('/searchlibrary', function () {
        return view('searchlibrary');
    })->name('searchlibrary');

    Route::get('/homelec', function () {
        return view('homelec');
    })->name('homelec');

    Route::get('/aboutuslec', function () {
        return view('aboutuslec');
    })->name('aboutuslec');

    Route::get('/accountlec', function () {
        return view('accountlec');
    })->name('accountlec');

    Route::get('/profilelec', function () {
        return view('profilelec');
    })->name('profilelec');

    Route::get('/messagelec', function () {
        return view('messagelec');
    })->name('messagelec');

    Route::get('/reportfeedbacklec', function () {
        return view('reportfeedbacklec');
    })->name('reportfeedbacklec');

    Route::get('/addskill', function () {
        return view('addskill');
    })->name('addskill');

    Route::get('/createassess', function () {
        return view('createassess');
    })->name('createassess');

    Route::get('/track', function () {
        return view('track');
    })->name('track');

    Route::get('/writeassess', function () {
        return view('writeassess');
    })->name('writeassess');

    Route::get('/homeadmin', function () {
        return view('homeadmin');
    })->name('homeadmin');

    Route::get('/aboutusadmin', function () {
        return view('aboutusadmin');
    })->name('aboutusadmin');

    Route::get('/accountadmin', function () {
        return view('accountadmin');
    })->name('accountadmin');

    Route::get('/messageadmin', function () {
        return view('messageadmin');
    })->name('messageadmin');

    Route::get('/profileadmin', function () {
        return view('profileadmin');
    })->name('profileadmin');

    Route::get('/reportfeedbackadmin', function () {
        return view('reportfeedbackadmin');
    })->name('reportfeedbackadmin');

    Route::get('/usermanagement', function () {
        return view('usermanagement');
    })->name('usermanagement');

    Route::get('/notifs', function () {
        return view('notifs');
    })->name('notifs');

    Route::get('/adminaccesscontrol', function () {
        return view('adminaccesscontrol');
    })->name('adminaccesscontrol');

    Route::get('/system', function () {
        return view('system');
    })->name('system');
});