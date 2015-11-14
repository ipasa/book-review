<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;

class BookController extends Controller{

    protected function singleBook($id){
        $singleBook =   Book::findOrFail($id);
        return view('pages.singlebook')->with('bookdetails', $singleBook);
    }

    public function categoryShow($id){
        $categoryName       =   Category::find($id);
        $aCategoryDetails   =   Book::where('category_id', $id)->get();
        return view('pages.categoryShow')->with('aCategoryDetails', $aCategoryDetails)
                                         ->with('categoryName', $categoryName);
    }

}