@extends('layouts.default')

@section('title', $title)

@section('header')
    @include('layouts.header')
@endsection

@section('main')
    <div class="wrapper">
        <form action="{{ route('user.update', Auth::user()) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <input type="file" name="image" id="image">
            </div>
            <div>
                <label for="name">名前</label>
                <input type="text" id="name" name="name" value="{{ old('name') ? old('name') : Auth::user()->name }}">
            </div>
            <div>
                <label for="profile">プロフィール</label>
                <textarea name="profile" id="profile">{{ old('profile') ? old('profile') : Auth::user()->profile }}</textarea>
            </div>
            <div>
                <input type="submit" value="更新">
            </div>
        </form>
    </div>
@endsection