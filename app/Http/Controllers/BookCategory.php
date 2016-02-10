<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategory    =   \DB::table('books')
                            ->select(\DB::raw('count(*) as count, category_id'))
                            ->groupBy('category_id')
                            ->get();
        //dd($allCategory);
        return view('test')->with('allcates', $allCategory);
    }
}
