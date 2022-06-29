<header class="mb-3">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('top') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('likes') }}">お気に入り</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders') }}">注文履歴</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.show', Auth::user()) }}">プロフィール</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('item.create') }}">新規出品</a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">サインイン</a>
                    </li>
                @endguest
            </ul>
            @auth
                <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">ログアウト</button>
                </form>
            @endauth
        </div>
      </nav>
</header>