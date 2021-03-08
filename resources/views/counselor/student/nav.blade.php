<nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <a href="{{route('studentcounselling', $student->id)}}"><button class="btn btn-outline-success" type="button">Counselling Record</button></a>
    <a href="{{route('studentbadrecords', $student->id)}}"><button class="btn btn-outline-success" type="button">Bad Record</button></a>
  </form>
</nav>