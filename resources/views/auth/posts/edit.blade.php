@extends('layouts.common')
@section('content')

<div class="post-new-wrapper">
    <form class="post-page-wrapper" action="/posts/edit/{{$article->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="post-new-box mx-auto" style="width: 80%;">
            <div class="post-new-box-left">
                <input type="file" class="form-control-file" id="img-file" name="image" value="{{$article->image}}">
                <div class="img-preview" id="img-preview">
                    <img id="thumbnail" class="img-preview_content" accept="image/*" src="">
                </div>
            </div>
            <div class="post-new-box-right">
                <div class="post-new-title">
                    <input type="text" class="form-control" id="title-input" placeholder="タイトル" name="title" value="{{$article->title}}">
                </div>
                <div class="post-new-detail">
                    <textarea cols="60" class="form-control" id="body-input" placeholder="説明文" name="body">{{$article->body}}</textarea>
                    <div class="post-new-material">
                        <div class="post-new-material-box">
                            <input type="text" class="form-control" placeholder="材料" name="name1">
                            <input type="text" class="form-control" placeholder="数量" name="quantity1">
                        </div>
                        <div class="post-new-material-box">
                            <input type="text" class="form-control" placeholder="材料" name="name2">
                            <input type="text" class="form-control" placeholder="数量" name="quantity2">
                        </div>
                        <div class="post-new-material-box">
                            <input type="text" class="form-control" placeholder="材料" name="name3">
                            <input type="text" class="form-control" placeholder="数量" name="quantity3">
                        </div>
                        <div class="post-page-footer">
                            <input type="submit" class="post-button btn-lg" value="レシピを投稿">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection