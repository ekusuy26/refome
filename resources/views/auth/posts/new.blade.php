@extends('layouts.common')
@section('content')

<div class="post-new-wrapper">
    <form class="post-page-wrapper" action="/posts/new" method="post" enctype="multipart/form-data">
        @csrf
        <div class="post-new-box mx-auto" style="width: 80%;">
            <div class="post-new-box-left">
                <input type="file" class="form-control" id="img-file" name="image">
                <div class="img-preview" id="img-preview">
                    <img id="thumbnail" class="img-preview_content" style="height:300px; width:300px; " accept="image/*" src="">
                </div>
            </div>
            <div class="post-new-box-right">
                <div class="post-new-title">
                    <input type="text" class="form-control" id="title-input" placeholder="タイトル" name="title">
                </div>
                <div class="post-new-detail">
                    <textarea cols="60" class="form-control" id="body-input" placeholder="説明文" name="body"></textarea>
                    <div class="post-new-material">
                        <input type="text" class="form-control" placeholder="材料" name="name">
                        <input type="text" class="form-control" placeholder="数量" name="quantity">
                        <div class="post-page-footer">
                            <input type="submit" class="post-button" value="レシピを投稿">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection