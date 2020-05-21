<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('auth.posts.new');
    }

    public function postArticle(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'image' => 'required|string',
            'material' => 'required|integer',
            'body' => 'required|string',
        ]);

        Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'image' => $request->image,
            'material' => $request->material,
            'body' => $request->body,
        ]);
        return redirect('/');
    }

}
