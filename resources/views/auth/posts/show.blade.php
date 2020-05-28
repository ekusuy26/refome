@extends('layouts.common')
@section('content')

<div class="post-show-wrapper">
  <div class="post-show-box mx-auto">
    <div class="post-show-box-left">
      @if (app()->isLocal() || app()->runningUnitTests())
      <img class="post-show-img" src="{{ asset('/storage/img/'.$article->image) }}">
      @else
      <img class="post-show-img" src="{{ $article->image }}">
      @endif
      <div class="like-box">
        <div class="like-box-left">
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
        </div>
        <div class="like-box-right">
          <div class="text-right mb-2">いいね！
            <span class="badge badge-pill badge-success">{{ $count_favorite_users }}</span>
          </div>
        </div>
      </div>
      <form method="post" action="/posts/delete/{{$article->id}}">
        {{ csrf_field() }}
        <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
      </form>
      <form method="get" action="/posts/edit/{{$article->id}}">
        {{ csrf_field() }}
        <input type="submit" value="編集" class="btn btn-danger btn-sm">
      </form>
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
            <div class="post-show-material">{{abs($food->quantity)}}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection