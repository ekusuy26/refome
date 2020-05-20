@extends('layouts.common')
@section('content')
<form class="post-page-wrapper" action="/drafts/new" method="post">
@csrf
    <input type="text" class="form-control m-1" id="title-input" placeholder="食材" name="name">
    <input type="text" class="form-control m-1" placeholder="数量" name="quantity">
    <div class="post-page-footer">
        <input type="submit" class="post-button m-1" value="冷蔵庫に入れる">
    </div>
</form>

@endsection