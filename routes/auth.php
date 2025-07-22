<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\register\RegisteredUserController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use Illuminate\Http\Request;

Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'create'])
                ->name('register');
    Route::post('add-store', [AuthController::class, 'add_store'])
                ->name('register_tenant');

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
