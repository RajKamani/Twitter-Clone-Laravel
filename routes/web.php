<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
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

Route::middleware('auth')->group(function () {
    Route::get('/tweets', [TweetController::class, 'index'])->name('home');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets');
    Route::post('/profile/{user:username}/follow', [FollowsController::class, 'store'])->name('follow');
    Route::get('/profile/{user:username}/edit', [ProfilesController::class, 'edit'])->name('edit.profile')->middleware('can:edit,user');
    Route::patch('/profile/{user:username}', [ProfilesController::class, 'update'])->name('update.profile')->middleware('can:edit,user');
    Route::get('/{user:username}/explore', [ExploreController::class, 'index'])->name('explore');

});

Route::get('/profile/{user:username}', [ProfilesController::class, 'show'])->name('profile');
