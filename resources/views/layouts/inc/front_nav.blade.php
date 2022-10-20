<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/')}}">Sapica Groom</a>

      {{-- Search bar --}}
      <div class="search-bar" style="width: 40%; margin-left: 10%">
        <form action="{{ url('search') }}" method="POST">
          @csrf
          <div class="input-group">
            <input type="search" class="form-control" id="search_id" name="search_data" required aria-label="Username" aria-describedby="basic-addon1">
            <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
          </div>
        </form>
      </div>

      {{-- Nav bar --}}
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('gallery') }}">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('category') }}">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('appointments') }}">Appointments</a>
          </li>

          {{-- Guest --}}
        @guest
            @if (Route::has('login'))
              <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
              </li>
            @endif
            @if (Route::has('register'))
              <li class="nav-item"></li>
                <a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a>
              </li>
            @endif

          {{-- User --}}
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="{{ url('profile') }}">My Profile</a>
              </li><li>
                <a class="dropdown-item" href="{{ url('my-appointments') }}">My Appointments</a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ url('cart') }}">
                  My Cart
                  <span class="badge badge-pill bg-primary cart-count">0</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ url('whislist') }}">
                  My Whishlist
                  <span class="badge badge-pill bg-success wishlist-count">0</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ url('my-orders') }}">My Orders</a>
              </li>
              
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
            </ul>
          </li>
        @endguest
        @auth()
          
        @endauth
        </ul>

      </div>
    </div>
  </nav>