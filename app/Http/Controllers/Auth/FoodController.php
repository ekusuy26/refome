<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function index()
    {
        return view('auth.foods.new');
    }

    public function foodArticle(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        Food::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'quantity' => $request->quantity,
        ]);
        return redirect('/');
    }
}
