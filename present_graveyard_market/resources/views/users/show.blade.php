@extends('layouts.default')

@section('title', $title)

@section('header')
    @include('layouts.header')
@endsection

@section('main')
    <div class="container">
        <div>
            <h1>{{ $title }}</h1>
        </div>
        <div>
            <div>
                <img src="{{ $user->image ? Storage::url($user->image) : asset('images/no_image.png') }}" style="height: 100px" >
            </div>
            <div>
                名前：{{ $user->name }}
            </div>
            <div>                
                プロフィール：{{ $user->profile }}
            </div>
        </div>
        <a href="{{ route('user.edit', Auth::user()) }}">編集</a>
        <a href="{{ route('orders')}}">購入した商品</a>
        <hr>
        <div>
            <p>出品した商品</p>
            @include('layouts.item_list')
        </div>
    </div>
@endsection