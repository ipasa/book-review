<?php

namespace App\Http\Controllers;

use App\Follow;
use App\User;
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
        $authUserId =   \Auth::id();
        $users      =   User::all();

        /**
         * Looping for the perfect User
         *
         * @return \Illuminate\Http\Response
         */
         //for($i=1;$i<=10;$i++){
        foreach($users as $user){
            $i  =   $user->id;
            $user_name  =   $user->name;
            $favoritesA = \DB::table('favorites')->where('user_id', $i)->count();
            $favoritesB = \DB::table('favorites')->where('user_id', $authUserId)->count();

            $favoritesAlist = \DB::table('favorites')->select('book_id')->where('user_id',$i)->lists('book_id');


            $favoritesAintersetB = \DB::table('favorites')
                ->where('user_id', $authUserId)
                ->whereIn('book_id',$favoritesAlist)
                ->count();

            //Calculation of lift
            $liftAofB   =   $favoritesAintersetB/sqrt($favoritesB*$favoritesA);

            if($user->isFollowedBy($user->id)){
                $status     =   'Followed';
            }
            else
                $status     =   'Not Followed';

            if($liftAofB>0.5){
                $items[] = array(
                    'user_id'       =>  $i,
                    'user_name'     =>  $user_name,
                    'co-efficient'  =>  $liftAofB,
                    'status'        =>  $status
                );

            }
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

        $items = array_sort($items, 'co-efficient', SORT_DESC);
        return view('follow.canfollow')->with('items', $items);

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
     * Follow a User
     *
     */
    public function store()
    {
//        $followerID =   \Auth::id();
//        $followedId =   \Input::get('userIdToFollow');
//
//        $follow = new Follow;
//        $follow->follower_id    =   $followerID;
//        $follow->followed_id    =   $followedId;
//        $follow->save();

        \Auth::user()->follows()->attach(\Input::get('userIdToFollow'));

        //dd($followerID);
        return redirect()->back();;
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
     * Destroy a Follow user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Auth::user()->follows()->detach($id);
        return redirect('alluser');
        //\Auth::user()->favorites()->detach($id);
    }

    public function alluser()
    {
        $users      =   User::all();
        return view('pages.alluser')->with('users', $users);
    }
}
