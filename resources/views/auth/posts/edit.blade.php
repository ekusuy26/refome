@extends('layouts.common')
@section('content')

<div class="post-new-wrapper">
    <form class="post-page-wrapper" action="/posts/edit/{{$article->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="post-new-box mx-auto" style="width: 80%;">
            <div class="post-new-box-left">
                <input type="file" class="form-control-file" id="img-file" name="image">
                <div class="img-preview" id="img-preview">
                    <img id="thumbnail" class="img-preview_content" accept="image/*" src="https://refome20200527.s3-ap-northeast-1.amazonaws.com/myprefix/{{$article->image}}" style="height:300px; width:300px;">
                </div>
            </div>
            <div class="post-new-box-right">
                <div class="post-new-title">
                    <input type="text" class="form-control" id="title-input" placeholder="タイトル" name="title" value="{{$article->title}}">
                </div>
                <div class="post-new-detail">
                    <textarea cols="60" class="form-control" id="body-input" placeholder="説明文" name="body">{{$article->body}}</textarea>
                    <div class="post-new-material">
                        旧素材　数量(仮置き)
                        @foreach ($foods as $food)
                        <div class="post-new-material-box">
                            <div class="kari">{{$food->name}}</div>
                            <div class="kari">{{abs($food->quantity)}}</div>
                        </div>
                        @endforeach
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