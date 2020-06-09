<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    // データの追加や更新が可能
    protected $fillable = ['user_id', 'category_id', 'name', 'quantity'];
    protected $table = 'foods';

    public function category()
      {
        return $this->belongsTo(Category::class);
      }
}
