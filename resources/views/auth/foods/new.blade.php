@extends('layouts.common')
@section('content')

<div class="food-regist-wrap">
  <form class="post-page-wrapper" action="/foods/new" method="post">
    @csrf
    <div class="food-wrap mx-auto m-1" style="width:50%">
      <select class="food-box col-md-3" name="category1">
        @if($errors->first('category1'))
        <div class="validation mx-auto m-1">{{ $errors->first('category1') }}</div>
        @endif
        <option value="0">選択してください</option>
        <option value="1">穀物・いも類</option>
        <option value="2">まめ類</option>
        <option value="3">野菜</option>
        <option value="4">果実</option>
        <option value="5">きのこ</option>
        <option value="6">海草</option>
        <option value="7">魚</option>
        <option value="8">海産</option>
        <option value="9">肉</option>
        <option value="10">卵・乳製品</option>
        <option value="11">お菓子</option>
        <option value="12">飲み物</option>
        <option value="13">調味料</option>
        <option value="14">その他</option>
      </select>
      <div class="food-box col-md-6">
        @if($errors->first('name1'))
        <div class="validation mx-auto m-1">{{ $errors->first('name1') }}</div>
        @endif
        <input type="text" class="form-control m-1" id="title-input" placeholder="食材1" name="name1">
      </div>
      <div class="food-box col-md-3">
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
      <input type="submit" class="post-button btn-lg" value="冷蔵庫に入れる">
    </div>
  </form>
</div>

@endsection