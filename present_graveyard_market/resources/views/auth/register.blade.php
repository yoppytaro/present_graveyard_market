@extends('layouts.default')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
    <div class="container">
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="p-3">
                <div class="form-group">
                    <label for="name">ユーザー名</label>
                    <input class="form-control" type="name" name="name" id="name" value="{{ old('name') }}" placeholder="山田太郎">
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="yamada@gmail.com">
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">確認パスワード</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <div>
                    @component('components.button_danger')登録@endcomponent
                </div>
            </div>
        </form>
    </div>
@endsection

