<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function showTopPage()
    {
        $foodQuantities = Food::where('user_id', 1)
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(function ($row) {
                return $row->name;
            })
            ->map(function ($value) {
                return $value->sum('quantity');
            });
        return view('top', compact('foodQuantities'));
    }

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

    public function delete()
    {
        return view('auth.foods.delete');
    }

    public function foodDelete(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer',
        ]);

        Food::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'quantity' => -($request->quantity),
        ]);
        return redirect('/');
    }
}
