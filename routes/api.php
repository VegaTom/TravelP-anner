<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group(['prefix' => 'v1', 'as' => '.v1', 'middleware' => ['InjectAdminToken', 'jwt.auth' /*, 'CanUse'*/]], function () {

    Route::any('/', ['as' => '.index', function () {return response()->json(['error' => 'Section unavailable'], 503);}]);

    Route::group(['prefix' => 'routes', 'as' => '.routes'], function () {
        Route::get('/', ['as' => '.index', 'uses' => 'RouteController@index']);
        Route::put('/{id}', ['as' => '.roles', 'uses' => 'RouteController@update']);
    });

    Route::group(['prefix' => 'trips', 'as' => '.trips'], function () {
        Route::get('/', ['as' => '.index', 'uses' => 'TripController@index']);
        Route::post('/', ['as' => '.store', 'uses' => 'TripController@store']);
        Route::get('/{id}', ['as' => '.show', 'uses' => 'TripController@show']);
        Route::put('/{id}', ['as' => '.update', 'uses' => 'TripController@update']);
        Route::delete('/{id}', ['as' => '.delete', 'uses' => 'TripController@destroy']);
    });

    Route::group(['prefix' => 'users', 'as' => '.users'], function () {
        Route::get('/', ['as' => '.index', 'uses' => 'UserController@index']);
        Route::get('/{id}', ['as' => '.show', 'uses' => 'UserController@show']);
        Route::put('/{id}', ['as' => '.update', 'uses' => 'UserController@update']);
        Route::delete('/{id}', ['as' => '.delete', 'uses' => 'UserController@destroy']);
        Route::get('/{id}/trips', ['as' => '.getTrips', 'uses' => 'UserController@getTrips']);
        Route::put('/{id}/admin', ['as' => '.toggleAdminRole', 'uses' => 'UserController@toggleAdminRole']);
    });

});
