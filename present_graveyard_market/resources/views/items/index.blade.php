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
            <input type="text" id="serch_name">
            <select name="category" id="category">
                <option value="0">選択なし</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button id="serch">検索</button>
        </div>
        @include('layouts.item_list')
    </div>
@endsection
