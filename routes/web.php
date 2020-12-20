<?php

use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::middleware('auth')->group(function ()
{
    Route::get('/tweets',[TweetController::class,'index'])->name('home');
    Route::post('/tweets',[TweetController::class,'store'])->name('tweets');
});

Route::get('/profile/{user}',[ProfilesController::class,'show'])->name('profile');
