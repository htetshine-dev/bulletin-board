<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="{{ url('/') }}">
    SCM Bulletin Board
  </a>
  @guest
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
    @endif
  </ul>
  @else
  <ul class="navbar-nav ml-left">
    <li class="nav-item">
      <a class="nav-link" href="">Users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">User</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ __('/user/post-lists') }}">Posts</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a href="" class="nav-link">{{ Auth::user()->name }}</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
    </li>
  </ul>
  @endguest
</nav>