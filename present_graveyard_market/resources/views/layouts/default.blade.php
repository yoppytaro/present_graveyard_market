<html lang="ja">
<head>
    <meta charset="UTF-8">

    <title>@yield('title')</title>

    {{-- css --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/reset.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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