<html lang="ja">
<head>
    <meta charset="UTF-8">

    <title>@yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- css --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/reset.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    {{-- JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- paginathing.js -->
    {{-- https://github.com/alfrcr/paginathing --}}
    <script src="{{ asset('js/paginathing.min.js') }}"></script>
    {{-- bsCustomFileInput --}}
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="{{ asset('js/main.js') }}" charset="UTF-8"></script>
</head>
<body class="bg-white">
    @yield('header')

    <div class="flash_message container">
        @if(\Session::has('success'))
            @component('components.alert_info'){{\Session::get('success')}}@endcomponent
        @endif
        @foreach ($errors->all() as $error)
            @component('components.alert_error'){{$error}}@endcomponent
        @endforeach
    </div>

    
    @yield('main')
</body>
</html>