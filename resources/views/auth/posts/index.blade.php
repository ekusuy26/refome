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
        <a class="article-title" href="/posts/{{$article->id}}">{{ $article->title }}</a>
        <div class="article-details">
          <div class="article-data">{{ $article->user_id }}</div>
          <div class="article-data">{{ $article->created_at }}</div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection