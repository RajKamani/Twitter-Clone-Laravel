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

    function storeTweet()
    {

        $data_to_store=\request()->validate([
            'tweetText' => ['Required', 'max:255'],
            'tweetImage' => ['file','mimes:jpg,png'],
        ]);

        $tweet = new Tweet();
        $tweet->user_id = auth()->id();
        $tweet->body=$data_to_store['tweetText'];
        if(request()->has('tweetImage'))
        {

            $data_to_store['tweetImage'] = request('tweetImage')->store('public\TweetImages');
            $tweet->path_image=$data_to_store['tweetImage'];
        }
        $tweet->save();
        return redirect(route('tweets'));
    }

    function destroy(Tweet $tweet)
    {
        try {
            $tweet->delete();
        } catch (\Exception $e) {
        }
        return back();
    }
}
