@extends('layouts.common')
@section('content')
<form class="post-page-wrapper" action="/foods/new" method="post">
  @csrf
  @if($errors->first('name'))
  <div class="validation">{{ $errors->first('name') }}</div>
  @endif
  <input type="text" class="form-control mx-auto m-1" style="width:50%;" id="title-input" placeholder="食材" name="name">
  @if($errors->first('quantity'))
  <div class="validation">{{ $errors->first('quantity') }}</div>
  @endif
  <input type="text" class="form-control mx-auto m-1" style="width:50%;" placeholder="数量" name="quantity">
  <div class="post-page-footer mx-auto m-1" style="width:50%;">
    <input type="submit" class="post-button m-1" value="冷蔵庫に入れる">
  </div>
</form>

@endsection