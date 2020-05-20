@extends('layouts.common')
@section('content')
<form class="post-page-wrapper" action="/foods/new" method="post">
  @csrf
  @if($errors->first('name'))
  <div class="validation">{{ $errors->first('name') }}</div>
  @endif
  <input type="text" class="form-control m-1" id="title-input" placeholder="食材" name="name">
  @if($errors->first('quantity'))
  <div class="validation">{{ $errors->first('quantity') }}</div>
  @endif
  <input type="text" class="form-control m-1" placeholder="数量" name="quantity">
  <div class="post-page-footer">
    <input type="submit" class="post-button m-1" value="冷蔵庫に入れる">
  </div>
</form>

@endsection