<header>
    <ul>
        <li>
            <a href="{{ route('top') }}">{{ config('app.name') }}</a>
        </li>
        @auth
            <li>
                <a href="{{ route('likes') }}">お気に入り一覧</a>
            </li>
            <li>
                <a href="{{ route('user.show', Auth::user()) }}">プロフィール</a>
            </li>
            <li>
                <a href="{{ route('item.create') }}">新規出品</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" value="ログアウト">
                </form>
            </li>
        @endauth
        @guest
            <li>
                <a href="{{ route('login') }}">ログイン</a>
            </li>
            <li>
                <a href="{{ route('register') }}">サインイン</a>
            </li>
        @endguest
    </ul>
</header>

