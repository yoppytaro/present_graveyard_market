@extends('layouts.default')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
    <div class="container">
        <form method="POST" action="{{ route('item.update', Auth::user()) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('layouts.item_form')
        </form>
        <form action="{{ route('item.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除">
        </form>
    </div>
@endsection