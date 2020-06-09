<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['name', 'quantity', 'post_id'];

    public function post()
    {
      return $this->belongsTo(Post::class);
    }
}
