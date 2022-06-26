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
            カテゴリー：{{ $item->category }}
            {{-- イメージは必須にしていいる --}}
            <a href="{{ route('item.show', $item->id) }}">
                <img src="{{ Storage::url($item->image) }}" style="height: 100px" >
            </a>
        </div>
        <div>
            <form action="{{ route('order.store', $item->id) }}" method="POST">
                @csrf
                <input type="submit" value="確定">
            </form>
        </div>
    </div>
@endsection

