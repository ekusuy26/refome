@extends('layouts.common')
@section('content')

<div class="post-show-wrapper">
  <div class="post-show-box mx-auto">
    <div class="post-show-box-left">
      <img src="{{ asset('/storage/img/'.$article->image) }}" style="width: 100%; border-radius: 4px;">
      @if (Auth::id() != $article->user_id)

      @if (Auth::user()->is_favorite($article->id))

      {!! Form::open(['route' => ['favorites.unfavorite', $article->id], 'method' => 'delete']) !!}
      {!! Form::submit('いいね！を外す', ['class' => "button btn btn-warning"]) !!}
      {!! Form::close() !!}

      @else

      {!! Form::open(['route' => ['favorites.favorite', $article->id]]) !!}
      {!! Form::submit('いいね！を付ける', ['class' => "button btn btn-success"]) !!}
      {!! Form::close() !!}

      @endif

      @endif
      <div class="text-right mb-2">いいね！
        <span class="badge badge-pill badge-success">{{ $count_favorite_users }}</span>
      </div>
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
          @foreach ($foods as $food)
          <div class="post-show-material-box">
            <div class="post-show-material">{{$food->name}}</div>
            <div class="post-show-material">{{$food->quantity}}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection