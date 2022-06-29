@extends('layouts.default')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
    <div class="container">
        <div>
            <h1>{{ $title }}</h1>
        </div>
        <form method="POST" action="{{ route('item.update', $item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input name="id" type="hidden" value="{{ $item->id }}">
            @include('layouts.item_form', ['bt_value' => '更新'])
        </form>
        <div class="text-center">
            <p>or</p>
        </div>
        <form action="{{ route('item.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="p-3">
                @component('components.button_secondary')削除@endcomponent
            </div>
        </form>
    </div>
@endsection