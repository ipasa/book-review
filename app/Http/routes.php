<?php

Route::get('/', 'HomepageController@index');
Route::get('/home', 'HomepageController@homepage');

#Favorites
Route::get('/favorites', function(){
    $favorites      =   \App\Book::all();
    $favorites_list =   DB::table('favorites')->whereUserId(Auth::user()->id)->lists('book_id');
    return view('favoriteBook.index', compact('favorites', 'favorites_list'));
});

Route::post('favorites', ['as'=>'favorites.store', function(){
    Auth::user()->favorites()->attach(Input::get('book-id'));
    return redirect('favorites');
}]);

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

