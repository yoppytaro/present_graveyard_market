<header class="header container">
    <ul class="list-unstyled list-inline">
        <li class="list-inline-item">
            <a href="{{ route('top') }}">{{ config('app.name') }}</a>
        </li>
        @auth
            <li class="list-inline-item">
                <a href="{{ route('likes') }}">お気に入り一覧</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('user.show', Auth::user()) }}">プロフィール</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('item.create') }}">新規出品</a>
            </li>
            <li class="list-inline-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" value="ログアウト">
                </form>
            </li>
        @endauth
        @guest
            <li class="list-inline-item">
                <a href="{{ route('login') }}">ログイン</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('register') }}">サインイン</a>
            </li>
        @endguest
    </ul>
</header>

