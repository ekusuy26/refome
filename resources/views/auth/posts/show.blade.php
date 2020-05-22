@extends('layouts.common')
@section('content')

<div class="post-show-wrapper">
  <div class="post-show-box mx-auto">
    <div class="post-show-box-left">
      <img src="{{ asset('/storage/img/'.$article->image) }}" style="width: 100%">
      @if (Auth::id() != $user->id)
      
          @if (Auth::user()->is_favorite($post->id))
      
              {!! Form::open(['route' => ['favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
                  {!! Form::submit('いいね！を外す', ['class' => "button btn btn-warning"]) !!}
              {!! Form::close() !!}
      
          @else
      
              {!! Form::open(['route' => ['favorites.favorite', $post->id]]) !!}
                  {!! Form::submit('いいね！を付ける', ['class' => "button btn btn-success"]) !!}
              {!! Form::close() !!}
      
          @endif
      
      @endif
    </div>
    <div class="post-show-box-right">
      <div class="post-show-title">{{$article->title}}</div>
      <div class="post-show-detail">
        <div class="post-show-body">
        <div class="post-show-body-text"><span class="under">　手順　</span></div>
        {{$article->body}}
        </div>
        <div class="post-show-body">
        <div class="post-show-body-text"><span class="under">　材料　</span></div>
        {{$article->material}}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection