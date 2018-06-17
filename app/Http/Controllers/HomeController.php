<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::orderBy('created_at', 'desc')->take(3)->get();
        return view('home')->with('topics', $topics);
    }

    public function profile() {
        return view('auth.profile');
    }
}
