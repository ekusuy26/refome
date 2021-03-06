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
        $foodLists = array();
        for ($categoryNum = 1; $categoryNum < 15; $categoryNum++) {
            $categoryName = Category::find($categoryNum)->name;
            $aggregate = Food::where('user_id', Auth::id())
                ->where('category_id', $categoryNum)
                ->get();
            if (isset($aggregate[0]) != true) {
                continue;
            }
            $aggregate = $aggregate->groupBy(function ($row) {
                return $row->name;
            })
                ->map(function ($value) {
                    return $value->sum('quantity');
                });
            array_push($foodLists, array($categoryName, $aggregate));
        }
        return view('top', compact('foodLists'));
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

        for ($foodNum = 1; $foodNum < 4; $foodNum++) {
            $name = 'name' . $foodNum;
            $quantity = 'quantity' . $foodNum;
            $category = 'category' . $foodNum;
            if (!empty($request->$name)) {
                Food::create([
                    'user_id' => Auth::user()->id,
                    'category_id' => $request->$category,
                    'name' => $request->$name,
                    'quantity' => $request->$quantity,
                ]);
            }
        }
        return redirect('/');
    }

    public function edit()
    {
        $foods = Food::where('user_id', Auth::id())
            ->orderBy('category_id', 'asc')
            ->get();
        $categories_id = array();
        foreach ($foods as $f) {
            array_push($categories_id, $f->category_id);
        }
        $categoryLists = array_values(array_unique($categories_id));
        $categories = category::whereIn('id', $categoryLists)->get();
        return view('auth.foods.edit', compact('categories', 'foods'));
    }

    public function foodEdit(Request $request)
    {
        $foodDatas = Food::where('user_id', Auth::id())->get();
        foreach ($foodDatas as $foodData) {
            $foodId = $foodData->id;
            $food = Food::find($foodId);
            $f = "quantity" . $foodId;
            $food->quantity = $request->$f;
            $food->save();
        }
        Food::where('quantity', '0')->delete();
        return redirect('/');
    }
}
