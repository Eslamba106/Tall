<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Auth\PasswordController;
use App\Http\Controllers\Api\Auth\NewPasswordController;
use App\Http\Controllers\Api\Auth\VerifyEmailController;
use App\Http\Controllers\Api\Auth\PasswordResetLinkController;
use App\Http\Controllers\Api\register\RegisteredUserController;
use App\Http\Controllers\Api\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Api\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Api\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Api\Auth\EmailVerificationNotificationController;
use Illuminate\Http\Request;

Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'create'])
                ->name('register');
    Route::post('add-store', [AuthController::class, 'add_store'])
                ->name('register.add-store');

    // Route::post('register', function(){
    //     return "fsg";
    // });

    Route::get('login_page', [AuthController::class, 'login_page'])
                ->name('login_page');


    Route::post('login_main', [AuthController::class, 'login'])
                ->name('login');

});

Route::middleware('auth')->group(function () {
        Route::get('logout',  [AuthController::class , 'logout'])->name('logout');

});
