<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Food;
use App\Material;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function showPostPage()
    {
        $articles = Post::orderBy('created_at', 'desc')->get();
        return view('auth.posts.index', compact('articles'));
    }

    public function showLike()
    {
        $articles = Post::with('favorite_users')->where('user_id', Auth::id())->get();
        return view('auth.posts.index', compact('articles'));
    }

    public function index()
    {
        return view('auth.posts.new');
    }

    public function postArticle(Request $request)
    {
        if ($request->isMethod('POST')) {

            // ローカル環境用
            $path = $request->image->store('public/img');

            // // 本番環境用
            // $image = $request->file('image');
            // $path = Storage::disk('s3')->put('myprefix', $image, 'public');

            $article = Post::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'image' => basename($path),
                'body' => $request->body,
            ]);

            for ($materialNum = 1; $materialNum < 4; $materialNum++) {
                $name = 'name' . $materialNum;
                $quantity = 'quantity' . $materialNum;
                if (!empty($request->$name)) {
                    Material::create([
                        'user_id' => Auth::user()->id,
                        'post_id' => $article->id,
                        'name' => $request->$name,
                        'quantity' => $request->$quantity,
                    ]);
                }
            }

            return redirect("/posts/{$article->id}")->with(['success' => 'ファイルを保存しました']);
        }
        return view('posts.new');
    }

    public function showArticle($id)
    {
        $article = Post::where('id', $id)->first();
        $foods = Material::where('post_id', $id)->get();

        $count_favorite_users = $article->favorite_users()->count();

        $data = [
            'count_favorite_users' => $count_favorite_users,
        ];

        return view('auth.posts.show', compact('article', 'foods', 'count_favorite_users'));
    }

    public function delete(Request $request)
    {
        Post::find($request->id)->delete();
        return redirect('/posts');
    }

    public function edit($id)
    {
        $article = Post::find($id);
        $materials = Material::where('post_id', $id)->get();
        return view('auth.posts.edit', compact('article', 'materials'));
    }

    public function foodEdit(Request $request)
    {
        if (app()->isLocal()) {
            // ローカル環境用
            $path = $request->image->store('public/img');
        } else {
            $image = $request->file('image');
            $path = Storage::disk('s3')->put('myprefix', $image, 'public');
        }
        $article = Post::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $article->title = $request->title;
        $article->image = basename($path);
        $article->body = $request->body;
        $article->save();
        return redirect("/posts/{$article->id}")->with(['success' => 'レシピを更新しました']);
    }
}
