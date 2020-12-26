<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithLikes(Builder $query) //gives Total of likes
    {
        $query->leftJoinSub(

            'select tweet_id,sum(likes) likes, sum(!likes) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function dislike($user = null) //Creating Or Updating disLike in DB
    {
        $this->like($user, false);
    }

    public function like($user = null, $liked = true) //Creating Or Updating Like in DB
    {   if( ( $liked && $this->IsLikedBy( $user ) ) || (! $liked && $this->IsDislikedBy( $user ) ))
        {
            $this->DeleteLike( $user );
        }
        else{
            $this->likes()->updateOrCreate([
                'user_id' => $user ? $user->id : auth()->id(),
            ], [
                    'likes' => $liked
                ]
            );
        }

    }
    public function DeleteLike(User $user) {
        $like = $user->likes
            ->where('tweet_id', $this->id)
            ->first();
        $like->delete();
    }

    public function likes() //main Relationship
    {
        return $this->hasMany(Like::class);
    }

    public function IsLikedBy(User $user) //checking Particular tweet is liked by given user
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('likes', true)
            ->count();
    }

    public function IsDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('likes', false)
            ->count();
    }

    public function path_Image($value) // Getter For Tweet Image
    {
        return asset('storage/' . $value);
    }
}
