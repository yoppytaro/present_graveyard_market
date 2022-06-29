@extends('layouts.default')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="p-3">
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="yamada@gmail.com">
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div>
                    @component('components.button_danger')ログイン@endcomponent
                </div>
            </div>
        </form>
    </div>
@endsection
