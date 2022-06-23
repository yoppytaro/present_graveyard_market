<html lang="ja">
<head>
    <meta charset="UTF-8">

    <title>@yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- css --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/reset.css') }}"> --}}
    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    {{-- JS --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/main.js') }}" charset="UTF-8"></script>
</head>
<body>
    @yield('header')

    @if(\Session::has('success'))
        <div class="success">{{\Session::get('success')}}</div>
    @endif
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>

    @yield('main')
</body>
</html>