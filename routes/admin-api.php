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
    Route::post('logout','AuthController@logout')->middleware(['auth.role:admin','auth:admin']);
});

Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>['auth.role:admin','auth:admin']],function(){
    Route::get('info','AdminController@getInfo');
    Route::put('updateRole/{user}','AdminController@updateRole');
});
Route::apiResource('user','User\AdminController')->middleware(['auth.role:admin','auth:admin']);
Route::apiResource('role','Role\RoleController')->middleware(['auth.role:admin','auth:admin']);
Route::get('privilege','Privilege\PrivilegeController@index')->middleware(['auth.role:admin','auth:admin']);
Route::put('updatePri/{role}','Role\RoleController@updatePri')->middleware(['auth.role:admin','auth:admin']);
Route::any('test','\App\Http\Controllers\TestController@test');
