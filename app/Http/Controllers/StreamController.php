<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StreamController extends Controller
{
    public function show()
    {

        //$favoritesStream    =   \DB::table('favorites')->select('user_id', 'book_id', 'created_at')->get();
        //$commentStrem       =   \DB::table('comments')->select('user_id', 'book_id','comment', 'created_at')->get();
        //$followStrem        =   \DB::table('follows')->select('follower_id', 'followed_id', 'created_at')->get();

        if(\Auth::check()){
            $userID =   \Auth::id();
            $results = \DB::select( \DB::raw("
                            SELECT users.name as name, books.title as title, type
                            FROM users,books,favorites
                            WHERE favorites.user_id=users.id
                            AND favorites.book_id=books.id
                            AND users.id IN (SELECT follows.followed_id FROM follows WHERE follower_id=$userID)")
            );
            foreach ($results as $result) {
                $result =   array($result);
                $dataArray[]  =   array(
                    'col1'  =>  $result[0]->name,
                    'col2'  =>  $result[0]->title,
                    'col3'  =>  $result[0]->type
                );
            }

            $results = \DB::select( \DB::raw("
                                    SELECT users.name as name, books.title as title, type
                                    FROM users,books,comments
                                    WHERE comments.user_id=users.id
                                    AND comments.book_id=books.id
                                    AND users.id IN (SELECT follows.followed_id FROM follows WHERE follower_id=$userID)")
            );
            foreach ($results as $result) {
                $result =   array($result);
                $dataArray[]  =   array(
                    'col1'  =>  $result[0]->name,
                    'col2'  =>  $result[0]->title,
                    'col3'  =>  $result[0]->type
                );
            }


            return view('pages.stream')->with('items', $dataArray);
        }
        else
            \Session::flash('message', "You Are not to authorized to See this page page, Please Login first");
            return redirect('error');

    }
}
