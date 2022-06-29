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
            <form action="{{ route('order.store', $item->id) }}" method="POST">
                @csrf
                <input class="btn btn-danger btn-lg btn-block" type="submit" value="確定">
            </form>
        </div>
    </div>
@endsection

