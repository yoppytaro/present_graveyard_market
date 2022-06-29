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
        <div class="mb-2">
            <a class="text-decoration-none" href="{{ route('order.confirmation', $item) }}">
                @component('components.button_danger')購入@endcomponent
            </a>
        </div>
        <div class="mb-2">
            <a class="text-decoration-none" href="{{ route('item.edit', $item) }}">
                @component('components.button_primary')編集@endcomponent
            </a>
        </div>
    </div>
@endsection

