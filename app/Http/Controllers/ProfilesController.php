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
        }
        catch(ModelNotFoundException $e){
            return redirect('home');
        }
        return view('profiles.show')->withUser($user);
    }

    public function edit($id)
    {
        $user   =   User::with('profile')->findOrFail($id);
        return view('profiles.edit')->withUser($user);;
    }

    public function update($id)
    {
        $user   =   User::with('profile')->findOrFail($id);
        $input  =   \Input::only('location', 'bio', 'twitter_username', 'github_username');

        $user->profile->fill($input)->save();

        return redirect('/'.$user->id);
    }


}
