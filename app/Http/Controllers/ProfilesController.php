<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
     /**
     * Display Profiles
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $user   =   User::with('profile')->findOrFail($id);
            $userFavoritedBookCount =   \DB::table('favorites')->where('user_id', $id)->count();
            $userfollowingCount     =   \DB::table('follows')->where('follower_id', $id)->count();
            $userfollowersCount     =   \DB::table('follows')->where('followed_id', $id)->count();
        }
        catch(ModelNotFoundException $e){
//            return redirect('error')->with('msg', 'The Message');
            \Session::flash('message', "This user does not exist in our system");
            return redirect('error');
        }
        return view('profiles.show')->withUser($user)
                                    ->with('userFavoritedBookCount', $userFavoritedBookCount)
                                    ->with('userfollowingCount', $userfollowingCount)
                                    ->with('userfollowersCount', $userfollowersCount);
    }

    public function edit($id)
    {
        if(\Auth::user()->id==$id){
            $user   =   User::with('profile')->findOrFail($id);
            return view('profiles.edit')->withUser($user);
        }
        else
            return 'You have no privilise to edit this page';
    }

    public function update(Requests\CreateProfileUpdateRequest $request,$id)
    {
        $user   =   User::with('profile')->findOrFail($id);
        $input  =   \Input::only('location', 'bio', 'twitter_username', 'github_username');
        $user->profile->fill($input)->save();

        return redirect('/user/'.$user->id);
    }


}
