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
        'username',
        'name',
        'avatar',
        'email',
        'password',
        'bio',
        'banner'
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
        $tweet = $this->follows()->pluck('id'); // getting Following User's ID
        $tweet = $tweet->push($this->id);                // Adding Current User Id (for showing Own tweets to timeline)

        return Tweet::whereIn('user_id', $tweet)->WithLikes()->latest()->paginate(20);// sort by latest Tweet

    }

    public function follows() //Following
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function getAvatarAttribute($value) // Getter For user's Avatar s
    {
        return asset('storage/' . $value);
    }

    public function getBannerAttribute($value) // Getter For user's Banner
    {
        return asset('storage/' . $value);
    }

    public function explore() // Explore Page
    {
        return $this->follows()->pluck('id')->push($this->id)->toArray();
    }

    public function tweets() // Tweets of user
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function likes() //User has many Likes
    {
        return $this->hasMany(Like::class);
    }

    public function Toggle_Follow_unFollow(User $user)
    {
        if ($this->is_following_already($user)) {
            return $this->unFollow($user);
        }
        return $this->follow($user);
    }

    public function is_following_already(User $user) //check whether current user already follow or not
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function unFollow(User $user) //Follow New User
    {
        return $this->follows()->detach($user);
    }

    public function follow(User $user) //Follow New User
    {
        return $this->follows()->save($user);
    }

}
