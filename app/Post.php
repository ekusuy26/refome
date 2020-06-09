<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'body', 'user_id', 'category_id'];

    public function favorite_users()
    {
            return $this->belongsToMany(User::class,'favorites','post_id','user_id')->withTimestamps();
    }

    public function user()
      {
        return $this->belongsTo(User::class);
      }

}
