<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        for($i=1;$i<=30;$i++){
            $favoritesA = \DB::table('favorites')->where('user_id', $i)->count();
            $favoritesB = \DB::table('favorites')->where('user_id', '3')->count();

            $favoritesAlist = \DB::table('favorites')->select('book_id')->where('user_id',$i)->lists('book_id');


            $favoritesAintersetB = \DB::table('favorites')
                ->where('user_id', '3')
                ->whereIn('book_id',$favoritesAlist)
                ->count();

            //Calculation of lift
            $liftAofB   =   $favoritesAintersetB/($favoritesB*$favoritesA);

            $items[] = array(
                'user_id' => $i,
                'co-efficient' => $liftAofB
            );
        }

        dd($items);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
