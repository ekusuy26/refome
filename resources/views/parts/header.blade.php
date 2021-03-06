<nav class="navbar navbar-expand-lg navbar-light pl-5 pr-5 pt-2 pb-2 sticky-top">
  <a class="logo navbar-brand text-white" href="/"></a>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="Navber">
    <form class="form-inline my-2 my-lg-0 ml-2">
      <input type="search" class="form-control mr-sm-2" placeholder="キーワードを入力" aria-label="検索...">
    </form>


    <ul class="navbar-nav ml-auto mr-5">
      @if (Auth::check())
      <li class="nav-item ml-2">
        <a class="nav-link" id="post-link" href="/posts">レシピ一覧</a>
      </li>
      <li class="nav-item ml-2">
        <a class="nav-link" id="post-link" href="/posts/new">レシピを投稿</a>
      </li>
      <li class="nav-item ml-2">
        <a class="nav-link" id="post-link" href="/foods/edit">使った材料の入力</a>
      </li>
      <li class="nav-item ml-2">
        <a class="nav-link" id="post-link" href="/foods/new">登録する</a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" style="width: 100px;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user" style="font-size: 20px;"></i>
        {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/mypage">マイページ</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">設定</a>
          <div class="dropdown-divider"></div>

          <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            ログアウト
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
      @else
      <li class="nav-item ml-2">
        <a class="nav-link text-white" id="register" href="/register">ユーザ登録</a>
      </li>
      <li class="nav-item ml-2">
        <a class="nav-link text-white" href="/">ログイン</a>
      </li>
      @endif
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>