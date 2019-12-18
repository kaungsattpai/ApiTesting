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
//
//Route::group(['prefix' => '/myProject'],function(){
//    Route::get('register', Config::get('myProjectRoute.test') . '\LoginController@register');
//    Route::get('login', Config::get('myProjectRoute.test') . '\LoginController@login');
//    Route::get('showUser', Config::get('myProjectRoute.test') . '\LoginController@show');
////   Route::get('login', 'LoginController@login')\;
//});

Route::group(['prefix' => '/myProject'], function(){
   Route::get('allBook', 'BookController@allBook');
   Route::get('searchBook/{search}', 'BookController@searchBook');
   Route::get('test', 'BookController@test');
   Route::get('chartsTest', 'BookController@chartsTest');
   Route::get('ownChart', 'BookController@ownChart');
});
