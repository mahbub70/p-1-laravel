<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\User\ProfileController;
use App\Http\Controllers\Website\User\Auth\LoginController;
use App\Http\Controllers\Website\User\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('website.')->group(function() {

    Route::controller(HomeController::class)->group(function() {
        Route::get('/','home')->name('home');
    });

    Route::prefix('user')->name('user.')->group(function() {

        Route::controller(RegisterController::class)->group(function() {
            Route::get('register','showRegistrationForm')->name('register');
            Route::post('register/request','registerRequest')->name('register.request')->middleware(['throttle:register']);

            Route::post('register/submit/{token}','register')->name('register.submit');

            // Registration Phone Verify
            Route::prefix('register/verify-phone')->name('register.verifyPhone.')->group(function() {
                Route::get('form/{token}', 'verifyPhoneView')->name('view');
                Route::post('submit/{token}','verifyPhoneSubmit')->name('submit')->middleware(['throttle:register']);
                Route::get('resend/{token}','verifyPhoneResend')->name('resend');
            });
        });

        Route::controller(ProfileController::class)->middleware(['auth'])->prefix('profile')->name('profile.')->group(function() {
            Route::get('/','index')->name('index');
        });

        Route::controller(LoginController::class)->prefix("login")->name("login.")->group(function() {
            Route::get("/",'showLoginForm')->name('view');
            Route::post("login","login")->name('submit');
        });

    });

});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
