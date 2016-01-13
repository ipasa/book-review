<?php

Route::get('/', 'HomepageController@index');
Route::get('/home', 'HomepageController@homepage');

Route::get('/alluser', function () {
    $users  =   \App\User::all();
    return view('pages/alluser')->with('users', $users);

});

#Favorites
//Route::get('/favorites', function(){
//    $favorites      =   \App\Book::all();
//    if(Auth::check()){
//        $favorites_list =   DB::table('favorites')->whereUserId(Auth::user()->id)->lists('book_id');
//        return view('favoriteBook.index', compact('favorites', 'favorites_list'));
//    }
//    return view('favoriteBook.index', compact('favorites'));
//});
Route::post('favorites', ['as'=>'favorites.store', function(){
    Auth::user()->favorites()->attach(Input::get('book-id'));
    return redirect('favorites');
}]);
#Remove from Favorites
Route::delete('favorites/{bookId}', ['as'=>'favorites.destroy', function($bookid){
    Auth::user()->favorites()->detach($bookid);
    return redirect('favorites');
}]);
Route::get('/user/{userId}/favorites', function ($userId) {
    if(Auth::check()) {
        $favorites_name =   \App\User::findOrFail($userId);
        $favorites = \App\User::findOrFail($userId)->favorites;
        $favorites_list = DB::table('favorites')->whereUserId(Auth::user()->id)->lists('book_id');
        return view('favoriteBook.index', compact('favorites', 'favorites_list'))->with('name', $favorites_name);
    }
    $favorites_name =   \App\User::findOrFail($userId);
    $favorites      =   \App\User::findOrFail($userId)->favorites;
    $favorites_list =   DB::table('favorites')->whereUserId($userId)->lists('book_id');
    return view('favoriteBook.user', compact('favorites', 'favorites_list'))->with('name', $favorites_name);
});

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
Route::get('/user/{profile}', 'ProfilesController@show');

