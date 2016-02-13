<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Cookie;
use App\Book;
use App\Category;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Cookie::queue(Cookie::make('name', 'value', 'minutes'));

        $indivisualbookSuggestion = \DB::select(\DB::raw("
                                    SELECT itemID2, (sum/count) as average
                                    FROM dev
                                    WHERE count>2
                                    ORDER BY (sum/count) DESC LIMIT 10")
        );
        if($indivisualbookSuggestion){
            foreach($indivisualbookSuggestion as $singleSuggestion){
                $bookNameOrDetails  =   Book::findOrFail($singleSuggestion->itemID2);
                $items[]    =   array(
                    'book_id'       =>  $bookNameOrDetails->id,
                    'book_name'     =>  $bookNameOrDetails->title,
                    'book_image'    =>  $bookNameOrDetails->cover_image,
                    'book_desc'     =>  $bookNameOrDetails->description,
                    'book_isbn'     =>  $bookNameOrDetails->isbn,
                    'book_category' =>  $bookNameOrDetails->category->name
                );
            }
        }else{
            $items[]    =   array();
        }

        $tradingBooks = \DB::table('ratings')
            ->orderBy('updated_at', 'desc')
            ->orderBy('rating', 'desc')
            ->take(4)
            ->get();
        //dd($tradingBooks);
        foreach($tradingBooks as $tradingBook){
            $bookNameOrDetails  =   Book::findOrFail($tradingBook->book_id);
            $tradingBooksSuggestion[]    =   array(
                'book_id'       =>  $bookNameOrDetails->id,
                'book_name'     =>  $bookNameOrDetails->title,
                'book_image'    =>  $bookNameOrDetails->cover_image,
                'book_category' =>  $bookNameOrDetails->category->name
            );
        }

        //dd($tradingBooksSuggestion);

        return view('welcome')
            ->with('suggestedBooks',$items)
            ->with('tradingBooks',$tradingBooksSuggestion);
    }

    public function homepage()
    {
        return view('pages.homepage');
    }
}
