<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Cookie;

class BookController extends Controller{

    protected function singleBook($id){
        $singleBook =   Book::findOrFail($id);

        $indivisualbookSuggestion = \DB::select(\DB::raw("
                                    SELECT itemID2, (sum/count) as average
                                    FROM dev
                                    WHERE count>2 AND itemID1=$id
                                    ORDER BY (sum/count) DESC LIMIT 1")
        );
        if($indivisualbookSuggestion){
            foreach($indivisualbookSuggestion as $singleSuggestion){
                $bookNameOrDetails  =   Book::findOrFail($singleSuggestion->itemID2);
                $items[]    =   array(
                    'book_id'   =>  $bookNameOrDetails->id,
                    'book_name' =>  $bookNameOrDetails->title,
                    'book_image'=>  $bookNameOrDetails->cover_image,
                );
            }
        }else{
            $items[]    =   array();
        }

        //dd($indivisualbookSuggestion);

        if(\Auth::check()){
            $favorites_list =   \DB::table('favorites')->whereUserId(\Auth::user()->id)->lists('book_id');
            Cookie::queue(Cookie::make('name', $singleBook->title, 'minutes'));
            return view('pages.singlebook', compact('favorites', 'favorites_list'))
                ->with('bookdetails', $singleBook)
                ->with('suggestedBooks',$items);
        }
        Cookie::queue(Cookie::make('name', $singleBook->title, 'minutes'));
        return view('pages.singlebook')->with('bookdetails', $singleBook)
                ->with('suggestedBooks',$items);
    }

    public function categoryShow($id){
        $categoryName       =   Category::find($id);
        $aCategoryDetails   =   Book::where('category_id', $id)->paginate(16);
        return view('pages.categoryShow')
            ->with('aCategoryDetails', $aCategoryDetails)
            ->with('categoryName', $categoryName);
    }

    public function predict() {

        $userID=\Auth::id();

        $books   = Book::all();

        foreach($books as $book){
            $itemID =   $book->id;

            $denom = 0.0; //denominator
            $numer = 0.0; //numerator
            $k = $itemID;
            $sqls = \DB::select(\DB::raw("
                                    SELECT r.book_id, r.score_tag
                                    FROM comments r
                                    WHERE r.user_id=$userID AND r.book_id <> $itemID")
            );

            //for all items the user has rated
            foreach($sqls as $row)  {
                $j = $row->book_id;
                $ratingValue = $row->score_tag;

                //get the number of times k and j have both been rated by the same user
                $sql2 = \DB::select(\DB::raw("
                                    SELECT d.count, d.sum FROM dev d WHERE itemID1=$k AND itemID2=$j")
                );

                //dd($sqls);

                //skip the calculation if it isn't found
                if($sql2 > 0)  {

                    //$numrows = mysqli_fetch_assoc($count_result);
                    foreach($sql2 as $sql2){
                        $count  = $sql2->count;
                        $sum  = $sql2->sum;

                        // $count = mysqli_result($count_result, 0, "count");
                        // $sum = mysqli_result($count_result, 0, "sum");
                        //calculate the average
                        $average = $sum / $count;
                        //increment denominator by count
                        $denom += $count;
                        //increment the numerator
                        $numer += $count * ($average + $ratingValue);
                    }
                }
            }
            if ($denom == 0)
                //return 0;
                $myRating   =   0;
            else{
                //return ($numer / $denom);
                $myRating   =   $numer / $denom;
            }
                $bookItem[]   =   array(
                    'book_id'   =>  $itemID,
                    'book_name' =>  $book->title,
                    'book_image'=>  $book->cover_image,
                    'book_cate' =>  $book->category->name,
                    'rating'    =>  $myRating
                );
        }

        function array_sort($array, $on, $order=SORT_ASC)
        {
            $new_array = array();
            $sortable_array = array();

            if (count($array) > 0) {
                foreach ($array as $k => $v) {
                    if (is_array($v)) {
                        foreach ($v as $k2 => $v2) {
                            if ($k2 == $on) {
                                $sortable_array[$k] = $v2;
                            }
                        }
                    } else {
                        $sortable_array[$k] = $v;
                    }
                }

                switch ($order) {
                    case SORT_ASC:
                        asort($sortable_array);
                        break;
                    case SORT_DESC:
                        arsort($sortable_array);
                        break;
                }

                foreach ($sortable_array as $k => $v) {
                    $new_array[$k] = $array[$k];
                }
            }

            return $new_array;
        }

        $items = array_sort($bookItem, 'rating', SORT_DESC);
        $items = array_slice($items, 0, 10);
        //dd($items);

        return view('pages.personalRecommendation')->with('items', $items);;
    }

}