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
        @include('layouts.item_show')
        <div>
            <a href="{{ route('order.confirmation', $item) }}">購入</a>
        </div>
        <div>
            <a href="{{ route('item.edit', $item) }}">編集</a>
        </div>
        @include('layouts.like_button')
    </div>
@endsection

