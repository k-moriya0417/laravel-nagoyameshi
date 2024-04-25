<nav class="navbar navbar-expand-md shadow-sm nagoyameshi-header-container">
  <div class="container">
    <a class="navbar-brand" href="{{ route('top') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
    <form action="{{ route('restaurants.index') }}" method="GET" class="row g-1">
      <div class="col-auto">
        <input class="form-control nagoyameshi-header-search-input" name="keyword">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn nagoyameshi-header-search-button"><i class="fas fa-search nagoyameshi-header-search-icon"></i></button>
      </div>
    </form>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ms-auto mr-5 mt-2">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item ms-2">
          <a class="nav-link header-text" href="{{ route('register') }}">
          <i class="fa-solid fa-user-plus me-1"></i>  {{ __('会員登録') }}</a>
        </li>
        <li class="nav-item ms-2">
          <a class="nav-link header-text" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket me-1"></i>  {{ __('ログイン') }}</a>
        </li>
        @else
        <li class="nav-item ms-2">
          <a class="nav-link header-text" href="{{ route('mypage') }}">
            <i class="fas fa-user mr-1"></i>マイページ
          </a>
        </li>
        
        <li class="nav-item ms-2">
          <a class="nav-link header-text" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket"></i>  ログアウト
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>