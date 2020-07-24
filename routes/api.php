<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('admin.api.')->group(function () {
    Route::group([
        'prefix' => 'admin',
        'namespace' => 'Admin\Api'
    ], function () {
        Route::get('/all_categories', 'CategoryController@all_categories');
        Route::apiResource('/categories', 'CategoryController');
        Route::get('/all_countries', 'CountryController@all_countries');
        Route::apiResource('/countries', 'CountryController');
        Route::get('/countries/{country}/all_cities', 'CityController@all_cities');
        Route::apiResource('/countries/{country}/cities', 'CityController');
        Route::get('/all_types', 'TypeController@all_types');
        Route::apiResource('/types', 'TypeController');
        Route::get('/all_currencies', 'CurrencyController@all_currencies');
        Route::apiResource('/currencies', 'CurrencyController');
        Route::get('/all_experiences', 'ExperienceController@all_experiences');
        Route::apiResource('/experiences', 'ExperienceController');
        Route::apiResource('/jobs', 'JobController');
    });
});

Route::get('/jobs', 'Show\Api\JobController@index');
Route::get('/jobs/search', 'Show\Api\JobController@searchJobs');
