<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>GUIDANCE</h3>
    </div>

    <ul class="list-unstyled components">
        <div class="profile">
            {{-- <img src="{{asset('img/user.png')}}" alt="User Picture"> --}}
            <img src="https://lastfm.freetls.fastly.net/i/u/ar0/a127735682805b2aeaae08f88938adbd.jpg" alt="User Picture">
            <p>{{Auth::user()->name}}</p>
        </div>
        <li>
            <a href="#">Actions</a>
        </li>
        <li class="active">
            <a href="{{route('counselor.index')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
        </li>
        <li>
            <a href="#counselorsubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-tie"></i> Create Record</a>
            <ul class="collapse list-unstyled" id="counselorsubmenu">
                <li>
                    <a href="{{ url('badrecord') }}"><i class="fas fa-plus"></i>Bad Record</a>
                </li>
                <li>
                    <a href="{{ url('counsel') }}"><i class="fas fa-plus"></i>Counselling Session</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
