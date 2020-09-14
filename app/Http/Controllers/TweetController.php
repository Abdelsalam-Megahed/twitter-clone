<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
//        $tweets = Tweet::latest()->get();

        return view('tweets.index', [
            'tweets' => auth()->user()->timeline(),
        ]);
    }

    public function store(){
        $attribute = request()->validate(['body' => 'required|max:250']);

        Tweet::create([
            'user_id' => auth()->user()->id,
            'body' => $attribute['body']
        ]);

        return redirect()->route('home');
    }
}
