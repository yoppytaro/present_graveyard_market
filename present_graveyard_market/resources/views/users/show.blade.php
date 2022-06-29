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
        <div class="row bg-light pt-3 pb-3 mb-3">
            <img class="col-4" src="{{ $user->image ? Storage::url($user->image) : asset('images/no_image.png') }}">
            <div class="col-6">
                <p class="font-weight-bold">{{ $user->name }}</p>
                <div class="bg-white p-2 mb-3 h-50">
                    {{ $user->profile }}
                </div>
                <a class="text-decoration-none" href="{{ route('user.edit', Auth::user()) }}">
                    @component('components.button_primary')編集@endcomponent
                </a>
            </div>
        </div>        
        <div>
            <p>出品した商品</p>
            @include('layouts.item_list')
        </div>
    </div>
@endsection