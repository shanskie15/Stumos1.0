<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="margin-bottom:10px;">
    <div class="container">
      <a class="navbar-brand" href="{{ route('librarian.index') }}">
          {{ config('app.name', 'Stumos') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a href="{{ url('borrow') }}" class="nav-link">Borrow Book</a></li>
        <li class="nav-item"><a href="{{ url('student') }}" class="nav-link">Return Book</a></li>
        <li class="nav-item"><a href="{{ url('section') }}" class="nav-link">History</a></li>
    </ul>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @auth
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->firstname.' '.Auth::user()->lastname }}
                      </a>
  
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">
                            {{ __('Profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
  
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      </div>
                  </li>
              @endauth
          </ul>
      </div>
    </div>
  </nav>