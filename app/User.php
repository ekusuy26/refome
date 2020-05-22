<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // favoriteを通じてpostにつながってるという宣言
    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'post_id')->withTimestamps();
    }

    // いいねをつける
    public function favorite($postId)
    {
        $exist = $this->is_favorite($postId);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($postId);
            return true;
        }
    }

    // いいねを外す
    public function unfavorite($postId)
    {
        $exist = $this->is_favorite($postId);

        if($exist){
            $this->favorites()->detach($postId);
            return true;
        }else{
            return false;
        }
    }

    // いいねしてるかどうか
    public function is_favorite($postId)
    {
        return $this->favorites()->where('post_id',$postId)->exists();
    }
}
