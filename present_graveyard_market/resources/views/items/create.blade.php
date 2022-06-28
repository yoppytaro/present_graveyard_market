@extends('layouts.default')

@section('header')
    @include('layouts.header')
@endsection

@section('main')
    <div class="container">
        <form method="POST" action="{{ route('item.store', Auth::user()) }}" enctype="multipart/form-data">
            @csrf
            @include('layouts.item_form')
        </form>
    </div>
@endsection