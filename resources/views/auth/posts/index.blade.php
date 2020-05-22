@extends('layouts.common')
@section('content')

<div class="posts-wrapper">
  <div class="post-wrapper col-md-6">
    @foreach ($articles as $article)
    <div class="article-box">
      <div class="article-box-left">
        <img src="{{ asset('/storage/img/'.$article->image) }}" style="height: 150px; width: 150px">
      </div>
      <div class="article-box-right">
        <a class="article-title" href="/posts/{{$article->id}}">【料理名】{{ $article->title }}</a>
        <div class="article-details">
          <div class="article-data">【作成者】{{ $article->user->name }}</div>
          <div class="article-data">【作成日】{{ $article->created_at->format('Y/m/d') }}</div>
        </div>
        <div class="article-like text-right mb-2">いいね！
          <span class="badge badge-pill badge-success">{{ $article->favorite_users()->count() }}</span>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection