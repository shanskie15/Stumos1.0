<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        {{-- <h3>{{ config('app.name', 'Stumos') }}</h3> --}}
        <h3>Library</h3>
    </div>

    <ul class="list-unstyled components">
        <div class="profile">
            {{-- <img src="{{asset('img/user.png')}}" alt="User Picture"> --}}
            <img src="https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png" alt="Girl in a jacket" width="500" height="600">
            <p>{{Auth::user()->name}}</p>
        </div>
        <li>
            <a href="#">Portfolio</a>
        </li>
        <li class="active">
            <a href="{{route('library.index')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li>
            <a href="#employeeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-tie"></i> Borrow</a>
            <ul class="collapse list-unstyled" id="employeeSubmenu">
                <li>
                    <a href="{{route('library.create')}}"><i class="fas fa-plus"></i> Add Borrow</a>
                </li>
                <li>
                    <a href="{{route('borrow.index')}}"><i class="fas fa-table"></i> Borrow Table</a>
                </li>
               
                <li>
                    <a href="{{route('borrow.viewreturned')}}"><i class="fas fa-table"></i>Returned Books</a>
                </li>
            </ul>
        </li>
        {{-- <li>
            <a href="#studentSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-friends"></i> Student</a>
            <ul class="collapse list-unstyled" id="studentSubmenu">
                <li>
                    <a href="{{ route('student.index') }}"><i class="fas fa-table"></i> Student Table</a>
                </li>
                <li>
                    <a href="{{ route('student.create') }}"><i class="fas fa-plus"></i> Create Student</a>
                </li>
                <li>
                    <a href="{{ route('student.history') }}"><i class="fas fa-history"></i> Deleted History</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#sectionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-align-justify"></i> Section</a>
            <ul class="collapse list-unstyled" id="sectionSubmenu">
                <li>
                    <a href="{{ route('section.index') }}"><i class="fas fa-table"></i> Section Table</a>
                </li>
                <li>
                    <a href="{{ route('section.create') }}"><i class="fas fa-plus"></i> Create Section</a>
                </li>
                <li>
                    <a href="{{ route('section.history') }}"><i class="fas fa-history"></i> Deleted History</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#exportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-download"></i> Export File</a>
            <ul class="collapse list-unstyled" id="exportSubmenu">
                <li>
                    <a href="{{ route('employee.export') }}"><i class="fas fa-user-tie"></i> Employee</a>
                </li>
                <li>
                    <a href=""><i class="fas fa-user-friends"></i> Student</a>
                </li>
                <li>
                    <a href=""><i class="fas fa-align-justify"></i> Section</a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="list-unstyled CTAs">
        <li>
            <a href="" class="download">Download Excel Template</a>
        </li>
    </ul> --}}
</nav>
