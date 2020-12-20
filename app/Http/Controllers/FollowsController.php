<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    function store(User $user)
    {
        auth()->user()->Toggle_Follow_unFollow($user);
        return back();
    }
}
