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
        $foodQuantities = Food::where('user_id', Auth::id())
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
            'name1' => 'required|string',
            'quantity1' => 'required|integer',
        ]);

        Food::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name1,
            'quantity' => $request->quantity1,
        ]);
        if (!empty($request->name2)) {
            Food::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name2,
                'quantity' => $request->quantity2,
            ]);
        }
        if (!empty($request->name3)) {
            Food::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name3,
                'quantity' => $request->quantity3,
            ]);
        }
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
