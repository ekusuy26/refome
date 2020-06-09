@extends('layouts.common')
@section('content')
<form class="food-edit-form" action="/foods/edit" method="post">
  @csrf
  <div class="post-page-footer mx-auto m-1" style="width:50%;">
    <input type="submit" class="post-button btn-lg" value="冷蔵庫から取り出す">
  </div>
  <div class="food-edit-wrap mx-auto" style="width:90%;">
    @foreach ($categories as $category)
    <div class="category-wrap col-xl-3 col-md-4 col-sm-6">
      <div class="category-list">
      <div class="category-name">
        {{$category->name}}
      </div>
        @foreach ($foods as $food)
        @if ($food->category_id == $category->id)
        <div class="input-food">
          <div class="food-edit-name">{{$food->name}}</div>
          <input type="text" class="food-edit-quantity" id="title-input" name="quantity{{$food->id}}" value="{{$food->quantity}}">
        </div>
        @endif
        @endforeach
      </div>
    </div>
    @endforeach
  </div>
</form>
@endsection