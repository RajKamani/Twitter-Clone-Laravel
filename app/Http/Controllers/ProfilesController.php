<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ProfilesController extends Controller
{
    public function show(User $user)
    {

        return view('profiles.show', [
            'user' => $user
        ]);
    }
}
