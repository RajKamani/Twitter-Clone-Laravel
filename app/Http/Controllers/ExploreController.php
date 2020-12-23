<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ExploreController extends Controller
{
    public function index(User $user)
    {
        $user = $user->explore();
        return view('explore',
            [
             'users' => User::whereNotIn('id',$user)->paginate(7) //Query for Ignore Current User's Following Users
            ]
        );
    }
}
