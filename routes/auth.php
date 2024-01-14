<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\JobController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('user/login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    // //Category
    // Route::get('catagories', [CategoryController::class, 'index'])
    //             ->name('categories.index'); 
    // Route::get('catagories/create', [CategoryController::class, 'create'])
    //             ->name('categories.create');
    // Route::post('catagories/store', [CategoryController::class, 'store'])
    //             ->name('categories.store');
    // Route::get('catagories/edit/{id}', [CategoryController::class, 'edit'])
    //             ->name('categories.edit');
    // Route::get('catagories/update', [CategoryController::class, 'update'])
    //             ->name('categories.update');
    // Route::get('catagories/delete/{cid}', [CategoryController::class, 'destroy'])
    //             ->name('categories.delete');

    // //job
    // Route::get('all-job', [JobController::class, 'index'])
    //             ->name('jobs.index'); 
    // Route::get('jobs/create', [JobController::class, 'create'])
    //             ->name('jobs.create');
    // Route::post('jobs/store', [JobController::class, 'store'])
    //             ->name('jobs.store');
    // Route::get('jobs/edit{id}', [JobController::class, 'edit'])
    //             ->name('job.edit');
    // Route::get('jobs/update', [JobController::class, 'update'])
    //             ->name('job.update');
    // Route::get('jobs/delete{id}', [JobController::class, 'delete'])
    //             ->name('job.delete');
                
                
});

    //Category
    Route::get('catagories', [CategoryController::class, 'index'])
                ->name('categories.index'); 
    Route::get('catagories/create', [CategoryController::class, 'create'])
                ->name('categories.create');
    Route::post('catagories/store', [CategoryController::class, 'store'])
                ->name('categories.store');
    Route::get('catagories/edit/{cid}', [CategoryController::class, 'edit'])
                ->name('categories.edit');
    Route::post('catagories/update{cid}', [CategoryController::class, 'update'])
                ->name('categories.update');
    Route::get('catagories/delete/{cid}', [CategoryController::class, 'destroy'])
                ->name('categories.delete');

    //job
    Route::get('all-job', [JobController::class, 'index'])
                ->name('jobs.index'); 
    Route::get('jobs/create', [JobController::class, 'create'])
                ->name('jobs.create');
    Route::post('jobs/store', [JobController::class, 'store'])
                ->name('jobs.store');
    Route::get('jobs/edit/{jid}', [JobController::class, 'edit'])
                ->name('job.edit');
    Route::post('jobs/update/{jid}', [JobController::class, 'update'])
                ->name('job.update');
    Route::get('jobs/delete/{jid}', [JobController::class, 'destroy'])
                ->name('jobs.delete');
