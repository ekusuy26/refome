<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function showPostPage()
    {
        $articles = Post::orderBy('created_at', 'asc')->get();
        return view('auth.posts.index', compact('articles'));
    }

    public function showLike()
    {
        $articles = Post::orderBy('created_at', 'asc')->get();
        return view('auth.posts.index', compact('articles'));
    }
    
    public function index()
    {
        return view('auth.posts.new');
    }

    public function postArticle(Request $request)
    {
        if ($request->isMethod('POST')) {
            
            $path = $request->file('image')->store('public/img');

            $article = Post::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'image' => basename($path),
                'material' => Auth::user()->id,
                'body' => $request->body,
                ]);

            Food::create([
               'user_id' => Auth::user()->id,
               'post_id' => $article->id,
               'name' => $request->name1,
               'quantity' => -($request->quantity1),
                ]);
            if (!empty($request->name2)) {
                Food::create([
                   'user_id' => Auth::user()->id,
                   'post_id' => $article->id,
                   'name' => $request->name2,
                   'quantity' => -($request->quantity2),
                    ]);
            }
            if (!empty($request->name2)) {
                Food::create([
                   'user_id' => Auth::user()->id,
                   'post_id' => $article->id,
                   'name' => $request->name3,
                   'quantity' => -($request->quantity3),
                    ]);
            }
                
                return redirect("/posts/{$article->id}")->with(['success'=> 'ファイルを保存しました']);
        }
        return view('posts.new');
    }
    
    public function showArticle($id)
    {
        $article = Post::where('id', $id)->first();
        $foods = Food::where('post_id', $id)->get();

        $count_favorite_users = $article->favorite_users()->count();

        $data=[
               'count_favorite_users'=>$count_favorite_users,
              ];

        return view('auth.posts.show', compact('article', 'foods', 'count_favorite_users'));
    }

}
