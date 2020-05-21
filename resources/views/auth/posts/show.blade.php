@extends('layouts.common')
@section('content')

<div class="post-show-wrapper">
  <div class="post-show-box mx-auto">
    <div class="post-show-box-left">
      <img src="{{ asset('/storage/img/'.$article->image) }}" style="width: 100%">
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