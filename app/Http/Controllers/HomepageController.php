<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Cookie;

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

        return 'welcome';
    }

    public function homepage()
    {
        return view('pages.homepage');
    }
}
