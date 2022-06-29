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
            <a class="text-decoration-none" href="{{ route('top') }}">
                @component('components.button_danger')トップページ@endcomponent
            </a>
        </div>
    </div>
@endsection

