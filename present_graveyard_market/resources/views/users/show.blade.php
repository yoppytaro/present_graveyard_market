@extends('layouts.default')

@section('title', $title)

@section('header')
    @include('layouts.header')
@endsection

@section('main')
    <div class="wrapper">
        <div>
            <h1>{{ $title }}</h1>
        </div>
        <div>
            <div>
                <img src="{{ $user->image ? Storage::url($user->image) : asset('images/no_image.png') }}">
            </div>
            <div>
                名前：{{ $user->name }}
            </div>
            <div>                
                プロフィール：{{ $user->profile }}
            </div>
        </div>
        <a href="{{ route('user.edit', Auth::user()) }}">編集</a>
    </div>
@endsection