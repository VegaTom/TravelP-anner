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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Auth'], function () {

    Route::group(['prefix' => 'authenticate', 'as' => 'authenticate'], function () {

        Route::post('/', ['as' => '.login', 'uses' => 'LoginController@login']);
        Route::get('/', ['as' => '.info', 'uses' => 'LoginController@info'])->middleware(['jwt.auth']);

        Route::delete('/', ['as' => '.logout', 'uses' => 'LoginController@logout'])->middleware(['jwt.auth']);

    });

    Route::group(['prefix' => 'password', 'as' => 'password'], function () {
        Route::post('/', ['as' => '.password.request.recovery', 'uses' => 'PasswordController@passwordRequestRecovery']);
        Route::get('/{email}/{token}', ['as' => '.password.recovery', 'uses' => 'PasswordController@passwordRecovery']);
    });

    Route::post('/register', ['as' => 'register', 'uses' => 'RegisterController@register']);

});

Route::get('/admin/{a?}/{b?}/{c?}/{d?}/{e?}/{f?}/{g?}', ['as' => 'init.admin', function () {
    return view('angularjs.index');
}]);
