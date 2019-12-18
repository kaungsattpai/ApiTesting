<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => '/myProject'],function(){
    Route::post('register', Config::get('myProjectRoute.test') . '\LoginController@register');
    Route::get('login', Config::get('myProjectRoute.test') . '\LoginController@login');
    Route::get('show', Config::get('myProjectRoute.test') . '\LoginController@showAllUser');

    Route::group(['middleware' => 'jwt-auth'], function () {
        Route::get('showUser', Config::get('myProjectRoute.test') . '\LoginController@showAllUser');
        Route::put('editUser', Config::get('myProjectRoute.test'). '\LoginController@editUser');
        Route::delete('deleteUserByAdmin', Config::get('myProjectRoute.test') . '\LoginController@deleteUserByAdmin');
    });
});

Route::get('getAllUser', Config::get('myProjectRoute.test') . '\LoginController@getAllUser');
Route::post('anotherRegister', Config::get('myProjectRoute.test') . '\LoginController@anotherRegister');
