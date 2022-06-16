@extends('layouts.default')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
    <div class="wrapper">
        <form method="POST" action="{{ route('item.store', Auth::user()) }}" enctype="multipart/form-data">
            @csrf
            <div>
                <input type="file" name='image'>
            </div>
            <div>
                <label for="name">名前</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div>
                <label for="description">説明</label>
                <textarea name="description" id="description">{{ old('description') }}</textarea>
            </div>
            <div>
                <label for="price">価格</label>
                <input type="number" name="price" id="price">
            </div>
            <div>
                <label for="category">カテゴリー</label>
                <select name="category" id="category">
                    @foreach (\App\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="submit" value="登録">
            </div>
        </form>
    </div>
@endsection