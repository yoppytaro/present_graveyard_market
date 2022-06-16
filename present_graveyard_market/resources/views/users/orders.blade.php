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
            @include('layouts.item_list')
        </div>
    </div>
@endsection