<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookSuggestion extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userSuggestion(){
        $userID =   \Auth::id();
        $n      =   10;

        $dataArray1 = \DB::select(\DB::raw("
            SELECT d.itemID1 as 'item', sum(d.sum + d.count*r.score_tag)/sum(d.count) as 'avgrat'
            FROM  comments r, dev d
            WHERE r.user_id=$userID
            AND d.itemID1 NOT IN (SELECT book_id FROM comments WHERE user_id=$userID)
            AND d.itemID2=r.book_id
            GROUP BY d.itemID1 ORDER BY avgrat DESC LIMIT $n")
        );

        foreach ($dataArray1 as $result) {
            $result = array($result);

            $book_name = Book::findOrNew($result[0]->item);

            $dataArray[] = array(
                'col1' => $book_name->id,
                'col2' => $book_name->title
            );
        }


        //dd($dataArray);
        return view('pages.canSuggestion')->with('items', $dataArray);
    }
}
