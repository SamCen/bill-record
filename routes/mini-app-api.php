<?php
/**
 * Author sam
 * DateTime 2019-10-31 17:42
 * Description:
 */
Route::group(['prefix'=>'auth','namespace'=>'Auth'],function(){
    Route::post('login','AuthController@login');
    Route::post('logout','AuthController@logout')->middleware(['auth.role:user','auth:app']);
});
