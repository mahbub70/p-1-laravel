<?php

use App\Http\Controllers\GeoController;
use Illuminate\Support\Facades\Route;

Route::controller(GeoController::class)->prefix('get')->name('geo.')->group(function() {
    Route::post('get-districts-on-division','getDistrictsOnDivision')->name('getDistrictsOnDivision');
    Route::post('get-upazila-on-division','getUpazilasOnDistrict')->name('getUpazilasOnDistrict');
});