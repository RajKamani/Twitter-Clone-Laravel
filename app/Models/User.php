<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline() // Timeline of user
    {
        $tweet= $this->follows()->pluck('id'); // getting Following User's ID
        $tweet= $tweet->push($this->id);                // Adding Current User Id (for showing Own tweets to timeline)

        return Tweet::whereIn('user_id',$tweet)->get()->sortByDesc('created_at'); // sort by latest Tweet

    }
    public function getAvatarAttribute() // Getter For user's Avatar s
    {
        return 'https://i.pravatar.cc/200?u=\ ' .$this->email;
    }


    public function tweets() // Tweets of user
    {
         return $this->hasMany(Tweet::class);
    }
    public function follow(User $user) //Follow New User
    {
        return $this->follows()->save($user);
    }
    public function follows() //Following
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }


}
