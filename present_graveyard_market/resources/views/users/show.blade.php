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
            <div>
                名前：{{ $user->name }}
            </div>
            <div>                
                プロフィール：{{ $user->profile }}
            </div>
        </div>
    </div>
@endsection