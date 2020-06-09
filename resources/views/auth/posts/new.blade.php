@extends('layouts.common')
@section('content')

<div class="post-new-wrapper">
    <form class="post-page-wrapper" action="/posts/new" method="post" enctype="multipart/form-data">
        @csrf
        <div class="post-new-box mx-auto" style="width: 80%;">
            <div class="post-new-box-left">
                <input type="file" class="form-control-file" id="img-file" name="image">
                <div class="img-preview" id="img-preview">
                    <img id="thumbnail" class="img-preview_content" accept="image/*" src="">
                </div>
            </div>
            <div class="post-new-box-right">
                <div class="post-new-title">
                    <input type="text" class="form-control" id="title-input" placeholder="タイトル" name="title">
                </div>
                <div class="post-new-detail">
                    <textarea cols="60" class="form-control" id="body-input" placeholder="説明文" name="body"></textarea>
                    <div class="post-new-material">
                        <div class="post-new-material-box">
                            <select class="food-box col-md-3" name="category1" style="height:36px;">
                                <option value="initial">選択してください</option>
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
                            <input type="text" class="form-control" placeholder="材料" name="name1">
                            <input type="text" class="form-control" placeholder="数量" name="quantity1">
                        </div>
                        <div class="post-new-material-box">
                        <select class="food-box col-md-3" name="category3" style="height:36px;">
                                <option value="initial">選択してください</option>
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
                            <input type="text" class="form-control" placeholder="材料" name="name2">
                            <input type="text" class="form-control" placeholder="数量" name="quantity2">
                        </div>
                        <div class="post-new-material-box">
                        <select class="food-box col-md-3" name="category3" style="height:36px;">
                                <option value="initial">選択してください</option>
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