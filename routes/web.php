<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::name('admin.')->group(function () {
    Route::group([
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ], function () {
        Route::get('/', 'DefaultController@index')->name('admin.index');
        Route::get('/{any}', 'DefaultController@index')->where('any', '.*');
    });
});

Route::get('/jobs', 'Show\JobController@index');
Route::get('/jobs/search', 'Show\JobController@search')->name('jobs.search');
Route::get('/jobs/{job}', 'Show\JobController@show')->name('jobs.show');

