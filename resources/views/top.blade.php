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
@else
<div class="top-wrapper">
    <div class="foods-wrapper col-md-6">
        <div class="food-box-wrap mx-auto" style="width:80%">
            <table>
                <tr>
                    <th>食材名</th>
                    <td>数量</td>
                </tr>
                @foreach ($foodQuantities as $key => $foodQuantity)
                @if ($foodQuantity != 0)
                <tr>
                    <th>{{ $key }}</th>
                    <td>{{ $foodQuantity }}</td>
                </tr>
                @endif
                @endforeach
                <tr>
            </table>
            <!-- <div class="food-box">
                <div class="food-data" style="width: 60%">食材名</div>
                <div class="food-data" style="width: 40%">数量</div>
            </div> -->
            <!-- <div class="food-box">
                <div class="food-data" style="width: 60%">{{ $key }}</div>
                <div class="food-data" style="width: 40%">{{ $foodQuantity }}</div>
                </div> -->
        </div>
    </div>
</div>
@endif
@endsection