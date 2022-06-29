<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="{{ route('top') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a href="{{ route('likes') }}">お気に入り一覧</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.show', Auth::user()) }}">プロフィール</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('item.create') }}">新規出品</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" value="ログアウト">
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}">ログイン</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}">サインイン</a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>