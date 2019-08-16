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
    Route::get('/', 'ContactController@index');
    Route::post('/identify', 'ContactController@identify');
    Route::get('/verify/{token}', 'ContactController@verify');
    Route::get('/unidentified', 'ContactController@unidentified');
    Route::get('/logout', 'ContactController@logout');
    Route::get('/sneak/{emailId}', 'ContactController@sneakLink');

    Route::post('/create', 'ContactController@create');

    Route::put('/contact', 'ContactController@update');

    Route::group(['middleware' => '\App\Http\Middleware\ContactAuth::class'], function(){
        Route::resource(
            'phone-number', 'PhoneNumberController'
        )->only([
            'store',
            'update',
            'destroy',
        ]);
        Route::resource(
            'postal-address', 'PostalAddressController'
        )->only([
            'store',
            'update',
            'destroy',
        ]);
        Route::resource(
            'email-account', 'EmailAccountController'
        )->only([
            'store',
            'update',
            'destroy',
        ]);
        Route::get('/test', 'ContactController@index');
        Route::group(['middleware' => '\App\Http\Middleware\ContactAdmin::class'], function(){
            Route::get('/admin', 'Admin\AdminController@index');
        });
    });
});
