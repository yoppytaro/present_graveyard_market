@extends('layouts.default')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">メールアドレス</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <input type="submit" value="ログイン">
            </div>
        </form>
    </div>
@endsection
