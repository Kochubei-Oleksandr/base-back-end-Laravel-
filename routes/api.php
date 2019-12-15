<?php

Route::post('login', 'User\\AuthController@login');
Route::post('register', 'User\\AuthController@register');

Route::group(['middleware' => 'jwt-auth:user'], function () {
    //
});

Route::group(['prefix' => 'organization'], function () {
    Route::post('login', 'Organization\\AuthController@login');
    Route::post('register', 'Organization\\AuthController@register');

    Route::group(['middleware' => 'jwt-auth:organization'], function () {
        //
    });

});
