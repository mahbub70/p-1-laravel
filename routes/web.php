<?php

use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\User\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

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
        });

    });


});
