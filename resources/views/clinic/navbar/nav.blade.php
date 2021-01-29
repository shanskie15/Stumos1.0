<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="margin-bottom:10px;">
  <div class="container">
    <a class="navbar-brand" href="{{ route('healthcareprofessional.index') }}">
        {{ config('app.name', 'Stumos') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav mr-auto">
        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Assets
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/products">Products</a>
            <a class="dropdown-item" href="/employees">Employees</a>
            <a class="dropdown-item" href="/divisions">Divisions</a>
            <a class="dropdown-item" href="/clients">Clients</a>
            </div>
        </li> -->
        <li class="nav-item"><a href="{{url('healthcareprofessional')}}" class="nav-link">Scan Student</a></li>
        <li class="nav-item"><a href="{{url('consultation')}}" class="nav-link">Consultation</a></li>
        <li class="nav-item"><a href="{{url('history')}}" class="nav-link">History</a></li>
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