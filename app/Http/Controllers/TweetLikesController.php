<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
        protected function store(Tweet $tweet)
        {

            $tweet->like(auth()->user());
            return back();
        }

        protected function destroy(Tweet $tweet)
        {
            $tweet->dislike(auth()->user());
            return back();
        }
}
