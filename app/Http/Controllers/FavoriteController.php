<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Request $request, $id)
    {
            \Auth::user()->favorite($id);
            return back();
    }

    public function destroy($id)
    {
            \Auth::user()->unfavorite($id);
            return back();
    }

    public function showLike()
    {
        $articles = Post::orderBy('created_at', 'asc')->get();
        return view('auth.users.index', compact('articles'));
    }
}
