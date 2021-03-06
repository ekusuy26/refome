@extends('layouts.common')
@section('content')

<!-- ログインしてない場合はトップへアクセスすると下記が表示 -->
@if(!Auth::check())
<div id="login-wrapper" class="row">
    <div class="col-7">
        <h1 class="text-white"><b>冷蔵庫に何があったっけ！？</b></h1>
        <p class="text-white">refomeはあなたの冷蔵庫に何がストックされてるかを管理出来ます。<br>賢く食材を使い切りましょう！<br>作った料理のレシピのシェアも可能です。</p>
    </div>
    <div class="col-5">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <table>
                <tr>
                    <th>ユーザ名</th>
                    <td><input type="text" class="form-control" placeholder="username" size="50" value="{{ old('email') }}" name="username" required autofocus></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><input type="email" class="form-control" placeholder="email" size="50" name="email" required></td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td><input type="password" class="form-control" placeholder="password" name="password" required size="50"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="ログイン" class="form-control"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<div id="logo-wrap" class="row">
    <div class="login-logo col-5"></div>
</div>
@else
<div class="top-wrapper">
    <div class="foods-wrapper">
        <div class="food-box-wrap mx-auto row text-center">
            @foreach ($foodLists as $foodList)
            <div class="category-box col-xl-3 col-md-4 col-sm-6">
                <div class="top-category-wrap">
                    <div class="category-name">{{$foodList[0]}}</div>
                    <div class="category-foods mx-auto" style="width:100%;">
                        @foreach ($foodList[1] as $key => $food)
                        @if ($food != 0)
                        <div class="food-detail">
                            <div>{{$key}}</div>
                            <div>{{$food}}</div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection