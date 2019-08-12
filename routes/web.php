<?php

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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index');
    Route::post('/identify', 'HomeController@identify');
    Route::get('/verify/{token}', 'HomeController@verify');
    Route::get('/unidentified', 'HomeController@unidentified');
    Route::get('/logout', 'HomeController@logout');
    Route::get('/sneak/{emailId}', 'HomeController@sneakLink');

    Route::post('/create', 'HomeController@create');

    Route::group(['middleware' => '\App\Http\Middleware\ContactAuth::class'], function(){
        Route::get('/test', 'TestController@index');
        Route::group(['middleware' => '\App\Http\Middleware\ContactAdmin::class'], function(){
            Route::get('/admin', 'Admin\AdminController@index');
        });
    });
});
