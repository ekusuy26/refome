<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function showPostPage()
    {
        return view('auth.posts.new');
    }
    
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

        $article = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'image' => $request->image,
            'material' => $request->material,
            'body' => $request->body,
        ]);
        return redirect("/posts/{$article->id}");
    }

    public function showArticle($id)
    {
        $article = Post::where('id', $id)->first();
        return view('auth.item', compact('article'));
    }

}
