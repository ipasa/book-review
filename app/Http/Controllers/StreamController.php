<?php

namespace App\Http\Controllers;

use App\User;
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

        if (\Auth::check()) {
            $userID = \Auth::id();

            /**
             * Query for searching
             * and
             * inserting favorites
             */

            $results = \DB::select(\DB::raw("
                            SELECT users.name as name, users.id as user_id, books.title as title, books.id as book_id, type, favorites.created_at as created_at
                            FROM users,books,favorites
                            WHERE favorites.user_id=users.id
                            AND favorites.book_id=books.id
                            AND users.id IN (SELECT follows.followed_id FROM follows WHERE follower_id=$userID)")
            );
            foreach ($results as $result) {
                $result = array($result);
                $dataArray[$result[0]->created_at] = array(
                    'col1' => $result[0]->name,
                    'col2' => $result[0]->title,
                    'col3' => $result[0]->type,
                    'col4' => $result[0]->created_at,
                    'col5' => $result[0]->user_id,
                    'col6' => $result[0]->book_id
                );
            }

            /**
             * Query for searching
             * and
             * inserting Comments
             */
            $results = \DB::select(\DB::raw("
                                    SELECT users.name as name, users.id as user_id, books.title as title, books.id as book_id, type, comments.created_at as created_at
                                    FROM users,books,comments
                                    WHERE comments.user_id=users.id
                                    AND comments.book_id=books.id
                                    AND users.id IN (SELECT follows.followed_id FROM follows WHERE follower_id=$userID)")
            );
            foreach ($results as $result) {
                $result = array($result);
                $dataArray[$result[0]->created_at] = array(
                    'col1' => $result[0]->name,
                    'col2' => $result[0]->title,
                    'col3' => $result[0]->type,
                    'col4' => $result[0]->created_at,
                    'col5' => $result[0]->user_id,
                    'col6' => $result[0]->book_id
                );
            }

            /**
             * Query for searching
             * and
             * inserting Follows
             */
            $followStream = \DB::select(\DB::raw("
                                    SELECT DISTINCT follower_id,followed_id,type, follows.created_at as created_at
                                    FROM follows,users
                                    where follows.follower_id=users.id
                                    AND users.id IN (SELECT follows.followed_id FROM follows WHERE follower_id=$userID)")
            );
            foreach ($followStream as $result) {
                $result = array($result);

                $follower_name = User::findOrNew($result[0]->follower_id);
                $followed_name = User::findOrNew($result[0]->followed_id);

                $dataArray[$result[0]->created_at] = array(
                    'col1' => $follower_name->name,
                    'col2' => $followed_name->name,
                    'col3' => $result[0]->type,
                    'col4' => $result[0]->created_at,
                    'col5' => $result[0]->follower_id,
                    'col6' => $result[0]->followed_id
                );
            }

            krsort($dataArray);
            $dataArray = array_slice($dataArray, 0, 15);

            //echo $dataArray;
            //echo json_encode($dataArray);
            //dd($dataArray);
            return view('pages.stream')->with('items', $dataArray);
        } else
            \Session::flash('message', "You Are not to authorized to See this page page, Please Login first");
        return redirect('error');

    }
}
