@extends('layouts.common')
@section('content')
<form class="food-edit-form" action="/foods/edit" method="post">
  @csrf
  <div class="food-edit-wrap mx-auto" style="width:90%; display:flex; flex-wrap:wrap; text-align:center;">
    @foreach ($categories as $category)
    <div class="category-wrap col-3">
      {{$category->name}}
      @foreach ($foods as $food)
      @if ($food->category_id == $category->id)
      <div class="input-food" style="display:flex;">
        <div class="food-edit-name col-5 m-2">{{$food->name}}</div>
        <input type="text" class="form-control col-3 m-1" id="title-input" name="quantity{{$food->id}}" value="{{$food->quantity}}">
      </div>
      @endif
      @endforeach
    </div>
    @endforeach
  </div>
  <div class="post-page-footer mx-auto m-1" style="width:50%;">
    <input type="submit" class="post-button btn-lg" value="冷蔵庫から取り出す">
  </div>
</form>
@endsection