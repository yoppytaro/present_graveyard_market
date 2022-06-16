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
            名前：{{ $item->name }}
            説明：{{ $item->description }}
            価格：{{ $item->price }}
            カテゴリー：{{ $item->category->name }}
            {{-- イメージは必須にしていいる --}}
            <a href="{{ route('item.show', $item) }}">
                <img src="{{ Storage::url($item->image) }}" style="height: 100px" >
            </a>
        </div>
        <div>
            <a href="{{ route('top') }}">トップページ</a>
        </div>
    </div>
@endsection

