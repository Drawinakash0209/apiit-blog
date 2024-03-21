<?php

use App\Http\Controllers\StudentAuth\AuthenticatedSessionController;
use App\Http\Controllers\StudentAuth\ConfirmablePasswordController;
use App\Http\Controllers\StudentAuth\EmailVerificationNotificationController;
use App\Http\Controllers\StudentAuth\EmailVerificationPromptController;
use App\Http\Controllers\StudentAuth\NewPasswordController;
use App\Http\Controllers\StudentAuth\PasswordController;
use App\Http\Controllers\StudentAuth\PasswordResetLinkController;
use App\Http\Controllers\StudentAuth\RegisteredUserController;
use App\Http\Controllers\StudentAuth\VerifyEmailController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest:student')->group(function () {
    Route::get('student/register', [RegisteredUserController::class, 'create'])
                ->name('student.register');

    Route::post('student/register', [RegisteredUserController::class, 'store']);

    Route::get('student/login', [AuthenticatedSessionController::class, 'create'])
                ->name('student.login');

    Route::post('student/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('student/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('student.password.request');

    Route::post('student/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('student.password.email');

    Route::get('student/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('student.password.reset');

    Route::post('student/reset-password', [NewPasswordController::class, 'store'])
                ->name('student.password.store');
});

Route::middleware('auth:student')->group(function () {
    Route::get('student/verify-email', EmailVerificationPromptController::class)
                ->name('student.verification.notice');

    Route::get('student/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('student.verification.verify');

    Route::post('student/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('student.verification.send');

    Route::get('student/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('student.password.confirm');

    Route::post('student/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('student/password', [PasswordController::class, 'update'])->name('student.password.update');

    Route::post('student/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('student.logout');
});
