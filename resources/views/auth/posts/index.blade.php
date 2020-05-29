@extends('layouts.common')
@section('content')

<div class="posts-wrapper">
  <div class="post-wrapper col-md-6">
    @foreach ($articles as $article)
    <a href="/posts/{{$article->id}}" style="text-decoration:none;">
      <div class="article-box">
        <div class="article-box-left">
          <img src="https://refome20200527.s3-ap-northeast-1.amazonaws.com/myprefix/{{$article->image}}" style="height: 150px; width: 150px">
        </div>
        <div class="article-box-right">
          <div class="article-title">【料理名】{{ $article->title }}</div>
          <div class="article-details">
            <div class="article-data">【作成者】{{ $article->user->name }}</div>
            <div class="article-data">【作成日】{{ $article->created_at->format('Y/m/d') }}</div>
          </div>
          <div class="article-like text-right mb-2">
          <i class="fas fa-heart" style="color:red"></i>
            <span class="badge badge-pill badge-success">{{ $article->favorite_users()->count() }}</span>
          </div>
        </div>
      </div>
    </a>
    @endforeach
  </div>
</div>

@endsection