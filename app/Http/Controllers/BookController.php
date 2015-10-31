<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller{

    protected function singleBook($id){
        $singleBook =   Book::findOrFail($id);

        return view('pages.singlebook')->with('bookdetails', $singleBook);
    }

}