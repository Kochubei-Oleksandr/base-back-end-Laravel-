<?php

Route::post('login', 'User\\AuthController@login');
Route::post('register', 'User\\AuthController@register');
Route::post('refresh-token', 'User\\AuthController@refreshToken');
Route::post('logout', 'User\\AuthController@logout');

Route::group(['middleware' => 'jwt-auth:user'], function () {
    Route::get('user', 'User\\UserController@getOne');
    Route::put('user/{id}', 'User\\UserController@updateOne');
});

Route::group(['prefix' => 'organization'], function () {
    Route::post('login', 'Organization\\AuthController@login');
    Route::post('register', 'Organization\\AuthController@register');

    Route::group(['middleware' => 'jwt-auth:organization'], function () {
        //
    });

});

Route::get('countries', 'Location\\CountryController@getAll');
Route::get('regions', 'Location\\RegionController@getRegionsByCountry');
Route::get('cities', 'Location\\CityController@getCitiesByRegion');
