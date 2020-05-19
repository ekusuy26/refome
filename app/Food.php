<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    // データの追加や更新が可能
    protected $fillable = ['user_id', 'name', 'quantity'];
}
