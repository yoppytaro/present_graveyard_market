<header>
    <ul>
        <li>
            <a href="{{ route('top') }}">{{ config('app.name') }}</a>
        </li>
        @if (Auth::check())
            <li>
                <a href="#">お気に入り一覧</a>
            </li>
            <li>
                <a href="#">出品一覧</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="submit" value="ログアウト">
                </form>
            </li>
        @else
            <li>
                <a href="{{ route('login') }}">ログイン</a>
            </li>
            <li>
                <a href="{{ route('register') }}">サインイン</a>
            </li>
        @endif
    </ul>
</header>

