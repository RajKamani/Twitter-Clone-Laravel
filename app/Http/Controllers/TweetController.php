<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('home',[
            'tweets'=>auth()->user()->timeline()
        ]);
    }

    function store(Request $request)
    {
        $data_to_store=$request->validate([
            'tweetText' => 'Required | max:255'
        ]);
        $tweet = new Tweet();
        $tweet->user_id = auth()->id();
        $tweet->body=$data_to_store['tweetText'];
        $tweet->save();
        return redirect(route('tweets'));
    }
}
