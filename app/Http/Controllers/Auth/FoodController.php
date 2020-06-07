<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food;
use App\Category;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function showTopPage()
    {
        $categories = Category::get();
        $aaa = Food::where('user_id', Auth::id())
            ->where('category_id', 2)
            ->get()
            ->groupBy(function ($row) {
                return $row->name;
            })
            ->map(function ($value) {
                return $value->sum('quantity');
            });
        dd($aaa);
        $foodQuantities = Food::where('user_id', Auth::id())
            ->get()
            ->groupBy(function ($row) {
                return $row->name;
            })
            ->map(function ($value) {
                return $value->sum('quantity');
            });
        return view('top', compact('foodQuantities', 'categories'));
    }

    public function index()
    {
        return view('auth.foods.new');
    }

    public function foodArticle(Request $request)
    {
        // バリデーション
        $request->validate([
            'category1' => 'required|integer',
            'name1' => 'required|string',
            'quantity1' => 'required|integer',
        ]);

        Food::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category1,
            'name' => $request->name1,
            'quantity' => $request->quantity1,
        ]);
        if (!empty($request->name2)) {
            Food::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request->category2,
                'name' => $request->name2,
                'quantity' => $request->quantity2,
            ]);
        }
        if (!empty($request->name3)) {
            Food::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request->category3,
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
            'name1' => 'required|string',
            'quantity1' => 'required|integer',
        ]);

        Food::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name1,
            'quantity' => - ($request->quantity1),
        ]);
        if (!empty($request->name2)) {
            Food::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name2,
                'quantity' => - ($request->quantity2),
            ]);
        }
        if (!empty($request->name3)) {
            Food::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name3,
                'quantity' => - ($request->quantity3),
            ]);
        }
        return redirect('/');
    }
}
