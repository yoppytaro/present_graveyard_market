<html lang="ja">
<head>
    <meta charset="UTF-8">

    <title>@yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- css --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/reset.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}

    {{-- JS --}}
    <!-- paginathing.js -->
    {{-- https://github.com/alfrcr/paginathing --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/paginathing.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" charset="UTF-8"></script>
</head>
<body>
    @yield('header')

    @if(\Session::has('success'))
        <div class="success">{{\Session::get('success')}}</div>
    @endif
    <ul class="flash_message">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>

    @yield('main')
</body>
</html>