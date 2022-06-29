@extends('layouts.default')

@section('title', $title)

@section('header')
    @include('layouts.header')
@endsection

@section('main')
    <div class="container">
        <form action="{{ route('user.update', Auth::user()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('layouts.user_form', ['bt_value' => '更新'])
        </form>
        <div class="text-center">
            <p>or</p>
        </div>
        <form action="{{ route('user.destroy', Auth::user()) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="p-3">
                @component('components.button_secondary')削除@endcomponent
            </div>
        </form>
    </div>
@endsection