@extends('layouts.common')
@section('content')

<div class="item-page-wrapper">
  <div class="item-wrapper">
    <div class="item-header">
      <div class="date">{{$article->created_at}}</div>
    </div>
    <div class="item-title">{{$article->title}}</div>
    <div class="item-image">{{$article->image}}</div>
    <div class="item-material">{{$article->material}}</div>
    <div class="item-body">{{$article->body}}</div>
  </div>
</div>

@endsection