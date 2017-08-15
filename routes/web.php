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

Route::group(['prefix' => 'authenticate', 'as' => 'authenticate', 'namespace' => 'Auth'], function () {

    Route::post('/', ['as' => '.backend.login', 'uses' => 'LoginController@login']);
    Route::get('/', ['as' => '.backend.info', 'uses' => 'LoginController@info'])->middleware(['TokenRefresh', 'jwt.auth']);

    Route::delete('/', ['as' => '.logout', 'uses' => 'LoginController@logout'])->middleware(['jwt.auth']);

});

Route::group(['prefix' => 'password', 'as' => '.password', 'namespace' => 'Auth'], function () {
    Route::post('/', ['as' => '.password.request.recovery', 'uses' => 'PasswordController@passwordRequestRecovery']);
    Route::get('/{email}/{token}', ['as' => '.password.recovery', 'uses' => 'PasswordController@passwordRecovery']);
});

Route::get('/admin/{a?}/{b?}/{c?}/{d?}/{e?}/{f?}/{g?}', ['as' => 'init.admin', function () {
    return view('angularjs.index');
}]);
