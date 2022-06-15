@extends('layouts.default')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
    <div class="wrapper">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name">ユーザー名</label>
                <input type="text" id="name" name="name" value="{{old('name')}}">
            </div>
            <div>
                <label for="password">メールアドレス</label>
                <input type="email" id="email" name="email" value="{{old('email')}}">
            </div>
            <div>
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <label for="password_confirmation">確認パスワード</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>
            <div>
                <input type="submit" value="登録">
            </div>
        </form>
    </div>
@endsection
