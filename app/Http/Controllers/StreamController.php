<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StreamController extends Controller
{
    public function show()
    {
        //$users = \DB::table('favorites')->select('user_id', 'book_id', 'created_at')->paginate(15);
        //return view('pages.stream')->with('users',$users);

        $favoritesStream    =   \DB::table('favorites')->select('user_id', 'book_id', 'created_at')->get();
        $commentStrem       =   \DB::table('comments')->select('user_id', 'book_id','comment', 'created_at')->get();
        $followStrem        =   \DB::table('follows')->select('follower_id', 'followed_id', 'created_at')->get();

        $result = array_merge($commentStrem, $followStrem);
        //return view('pages.test')->with('results',$result);
        dd($result);
    }
}
