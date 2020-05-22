@extends('layouts.common')
@section('content')
<form class="post-page-wrapper" action="/foods/delete" method="post">
  @csrf
  <div class="food-wrap mx-auto m-1" style="width:50%">
    <div class="food-box col-md-6">
      @if($errors->first('name'))
      <div class="validation m-1">{{ $errors->first('name') }}</div>
      @endif
      <input type="text" class="form-control m-1" id="title-input" placeholder="食材" name="name1">
    </div>
    <div class="food-box col-md-6">
      @if($errors->first('quantity'))
      <div class="validation m-1">{{ $errors->first('quantity') }}</div>
      @endif
      <input type="text" class="form-control m-1" placeholder="数量" name="quantity1">
    </div>
  </div>
  <div class="food-wrap mx-auto m-1" style="width:50%">
    <div class="food-box col-md-6">
      @if($errors->first('name'))
      <div class="validation m-1">{{ $errors->first('name') }}</div>
      @endif
      <input type="text" class="form-control m-1" id="title-input" placeholder="食材" name="name2">
    </div>
    <div class="food-box col-md-6">
      @if($errors->first('quantity'))
      <div class="validation m-1">{{ $errors->first('quantity') }}</div>
      @endif
      <input type="text" class="form-control m-1" placeholder="数量" name="quantity2">
    </div>
  </div>
  <div class="food-wrap mx-auto m-1" style="width:50%">
    <div class="food-box col-md-6">
      @if($errors->first('name'))
      <div class="validation m-1">{{ $errors->first('name') }}</div>
      @endif
      <input type="text" class="form-control m-1" id="title-input" placeholder="食材" name="name3">
    </div>
    <div class="food-box col-md-6">
      @if($errors->first('quantity'))
      <div class="validation m-1">{{ $errors->first('quantity') }}</div>
      @endif
      <input type="text" class="form-control m-1" placeholder="数量" name="quantity3">
    </div>
  </div>
  <div class="post-page-footer mx-auto m-1" style="width:50%;">
    <input type="submit" class="post-button m-1" value="冷蔵庫から取り出す">
  </div>
</form>

@endsection