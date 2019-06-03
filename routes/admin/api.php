<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::group(['prefix'=>'auth','namespace'=>'Auth'],function(){
    Route::post('login','AuthController@login');
    Route::post('logout','AuthController@logout');
});

Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>['auth:admin']],function(){
    Route::get('info','AdminController@getInfo');
});


Route::any('test','\App\Http\Controllers\TestController@test');
