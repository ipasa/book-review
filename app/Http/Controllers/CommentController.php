<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.comment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book_id    = \Input::get('book_id');
        $score_tag  = \Input::get('score_tag');

        if($score_tag=='P+'){$score_tag =   10;}
        elseif($score_tag=='P'){$score_tag =   8;}
        elseif($score_tag=='NEU'){$score_tag =   6;}
        elseif($score_tag=='N+'){$score_tag =   4;}
        elseif($score_tag=='N'){$score_tag =   2;}
        else{$score_tag =   0;}



        $comment = new \App\Comment();
        $comment->user_id = \Auth::user()->id;
        $comment->book_id = $book_id;
        $comment->comment = \Input::get('comment');
        $comment->score_tag = $score_tag;
        $comment->save();

        echo url('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
