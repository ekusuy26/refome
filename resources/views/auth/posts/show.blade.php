@extends('layouts.common')
@section('content')

<div class="post-show-wrapper">
  <div class="post-show-box mx-auto" style="width: 80%;">
    <div class="post-show-box-left">
      <img src="{{ asset('/storage/img/'.$article->image) }}" style="height: 300px; width: 300px">
    </div>
    <div class="post-show-box-right">
      <div class="post-show-title">TITLE：{{$article->title}}</div>
      <div class="post-show-detail">
        <div class="post-show-body">introduction：{{$article->body}}</div>
        <div class="post-show-material">material：{{$article->material}}</div>
      </div>
    </div>
  </div>
</div>

@endsection