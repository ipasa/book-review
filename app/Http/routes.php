<?php

Route::get('/', 'HomepageController@index');
Route::get('/home', 'HomepageController@homepage');

Route::get('/alluser', function () {
    $users = \App\User::all();
    return view('pages/alluser')->with('users', $users);

});

//Single Book Show by Detail's
Route::get('book/{id}', 'BookController@singleBook');

#Favorites
//Route::get('/favorites', function(){
//    $favorites      =   \App\Book::all();
//    if(Auth::check()){
//        $favorites_list =   DB::table('favorites')->whereUserId(Auth::user()->id)->lists('book_id');
//        return view('favoriteBook.index', compact('favorites', 'favorites_list'));
//    }
//    return view('favoriteBook.index', compact('favorites'));
//});

Route::get('/user/{userId}/favorites', function ($userId) {
    if (Auth::check()) {
        $favorites_name = \App\User::findOrFail($userId);
        $favorites = \App\User::findOrFail($userId)->favorites;
        $favorites_list = DB::table('favorites')->whereUserId(Auth::user()->id)->lists('book_id');
        return view('favoriteBook.index', compact('favorites', 'favorites_list'))->with('name', $favorites_name);
    }
    $favorites_name = \App\User::findOrFail($userId);
    $favorites = \App\User::findOrFail($userId)->favorites;
    $favorites_list = DB::table('favorites')->whereUserId($userId)->lists('book_id');
    return view('favoriteBook.user', compact('favorites', 'favorites_list'))->with('name', $favorites_name);
});
Route::post('favorites', ['as' => 'favorites.store', function () {
    Auth::user()->favorites()->attach(Input::get('book-id'));
    return redirect('/');
}]);
#Remove from Favorites
Route::delete('favorites/{bookId}', ['as' => 'favorites.destroy', function ($bookid) {
    Auth::user()->favorites()->detach($bookid);
    return redirect('/');
}]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Category Showing
Route::get('category/{id}', 'BookController@categoryShow');

#Profile
Route::group(['middleware' => 'auth'], function () {
    Route::resource('profile', 'ProfilesController', ['only' => ['show', 'edit', 'update']]);
});
Route::get('/user/{profile}', 'ProfilesController@show');

Route::get('test1', array('before' => 'csrf', 'uses' => function () {
    echo Input::get('comment');
}));

Route::get('comment', ['as' => 'comment.show', 'uses' => 'CommentController@index']);
Route::get('comment_save', 'CommentController@create');

//you can follow this people
Route::get('/canfollow', ['as'=>'can-follow', 'uses'=>'FollowController@index']);

//Streaming in our site
Route::get('/stream',['as'=>'stream-show', 'uses'=>'StreamController@show']);

//Error Page
Route::get('/error', function(){
    return view('error.error');
});



