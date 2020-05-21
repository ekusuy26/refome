@extends('layouts.common')
@section('content')

<div class="post-new-wrapper">
    <form class="post-page-wrapper" action="/posts/new" method="post" enctype="multipart/form-data">
        @csrf
        <div class="post-new-box mx-auto" style="width: 80%;">
            <div class="post-new-box-left">
                <input type="file" class="form-control" name="image">
            </div>
            <div class="post-new-box-right">
                <div class="post-new-title">
                    <input type="text" class="form-control" id="title-input" placeholder="タイトル" name="title">
                </div>
                <div class="post-new-detail">
                    <input type="text" class="form-control" id="body-input" placeholder="説明文" name="body">
                    <div class="post-new-material">
                        <input type="text" class="form-control" placeholder="材料" name="material">
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