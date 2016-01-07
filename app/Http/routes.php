<?php

Route::get('/', 'HomepageController@index');
Route::get('/home', 'HomepageController@homepage');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Single Book Show by Detail's
Route::get('book/{id}', 'BookController@singleBook');

//Category Showing
Route::get('category/{id}', 'BookController@categoryShow');

#Profile
Route::group(['middleware' => 'auth'], function()
{
    Route::resource('profile', 'ProfilesController', ['only'=>['show', 'edit', 'update']]);
});

Route::get('/{profile}', 'ProfilesController@show');

