<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <a href="{{route('studentcounselling', $student->id)}}"><button class="btn btn-outline-success" type="button">Counselling Record</button></a>
    <a href="{{route('studentbadrecords', $student->id)}}"><button class="btn btn-outline-success" type="button">Bad Record</button></a>
  </form>
</nav>

{{-- <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="{{route('studentcounselling', $student->id)}}">Counselling Records</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{route('studentbadrecords', $student->id)}}">Bad Records</a>
  </li>
</ul> --}}