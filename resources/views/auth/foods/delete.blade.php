@extends('layouts.common')
@section('content')
<form class="food-edit" action="/foods/delete" method="post">
  @csrf
  <div class="test-wrap mx-auto" style="width:90%; display:flex; flex-wrap:wrap;">
    @foreach ($categories as $category)
    <div class="category-wrap col-3">
      {{$category->name}}
      @foreach ($foods as $food)
      @if ($food->category_id == $category->id)
      <div class="test-wrap" style="display:flex;">
        <input type="text" class="form-control m-1" id="title-input" name="title" value="{{$food->name}}">
        <input type="text" class="form-control col-3 m-1" id="title-input" name="title" value="{{$food->quantity}}">
      </div>
      @endif
      @endforeach
    </div>
    @endforeach
  </div>
</form>

<div class="food-regist-wrap">
  <form class="post-page-wrapper" action="/foods/delete" method="post">
    @csrf
    <div class="food-wrap mx-auto m-1" style="width:50%">
      <div class="food-box col-md-6">
        @if($errors->first('name1'))
        <div class="validation m-1">{{ $errors->first('name1') }}</div>
        @endif
        <input type="text" class="form-control m-1" id="title-input" placeholder="食材1" name="name1">
      </div>
      <div class="food-box col-md-6">
        @if($errors->first('quantity1'))
        <div class="validation m-1">{{ $errors->first('quantity1') }}</div>
        @endif
        <input type="text" class="form-control m-1" placeholder="数量1" name="quantity1">
      </div>
    </div>
    <div class="food-wrap mx-auto m-1" style="width:50%">
      <div class="food-box col-md-6">
        <input type="text" class="form-control m-1" id="title-input" placeholder="食材2" name="name2">
      </div>
      <div class="food-box col-md-6">
        <input type="text" class="form-control m-1" placeholder="数量2" name="quantity2">
      </div>
    </div>
    <div class="food-wrap mx-auto m-1" style="width:50%">
      <div class="food-box col-md-6">
        <input type="text" class="form-control m-1" id="title-input" placeholder="食材3" name="name3">
      </div>
      <div class="food-box col-md-6">
        <input type="text" class="form-control m-1" placeholder="数量3" name="quantity3">
      </div>
    </div>
    <div class="post-page-footer mx-auto m-1" style="width:50%;">
      <input type="submit" class="post-button btn-lg" value="冷蔵庫から取り出す">
    </div>
  </form>
</div>
@endsection