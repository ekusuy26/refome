@extends('layouts.common')
@section('content')
<form class="post-page-wrapper" action="/posts/new" method="post" enctype="multipart/form-data">
@csrf
    <input type="text" class="form-control m-1" id="title-input" placeholder="タイトル" name="title">
    <input type="file" class="form-control m-1" placeholder="写真を選択" name="image">
    <input type="text" class="form-control m-1" placeholder="材料" name="material">
    <input type="text" class="form-control m-1" placeholder="説明文" name="body">
    <div class="post-page-footer">
        <input type="submit" class="post-button m-1" value="レシピを投稿">
    </div>
</form>

@endsection