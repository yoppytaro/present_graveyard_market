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
        <div class="row">
            <div class="col">
                <input class="form-control" type="text" id="serch_name" placeholder="商品名">
            </div>
            <div class="col">
                <select class="custom-select" name="category" id="category">
                    <option value="0">選択なし</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" id="serch">検索</button>
        </div>
        @include('layouts.item_list')
    </div>
@endsection
