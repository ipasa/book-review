<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StreamController extends Controller
{
    public function show()
    {
        return view('pages.stream');
    }
}
