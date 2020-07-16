<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('admin.api.')->group(function () {
    Route::group([
        'prefix' => 'admin',
        'namespace' => 'Admin\Api'
    ], function () {
        Route::apiResource('/categories', 'CategoryController');
        Route::apiResource('/countries', 'CountryController');
        Route::apiResource('/countries/{country}/cities', 'CityController');
        Route::apiResource('/types', 'TypeController');
        Route::apiResource('/currencies', 'CurrencyController');
        Route::apiResource('/experiences', 'ExperienceController');
        Route::apiResource('/jobs', 'JobController');
    });
});
