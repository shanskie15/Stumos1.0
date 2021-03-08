<?php
use App\Http\Controllers\BorrowController;
$total=0;
if(Session::has('user')){
  $total = BorrowController::returnedBook();
} 

?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Library</a>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/getaddborrow">Add Borrowed</a></li>
          <li class="active"><a href="/">Borrowed Book</a></li>
          <li class="active"><a href="/viewreturned">Returned Books</a></li>
          <form action="/search" class="navbar-form navbar-left">
            <div class="form-group">
               <input name="query" type="text" class="form-contro search-box " placeholder="Search">
            </div>
               <button type="submit" class="btn btn-default">Submit</button>
          </form> 
          
        </ul>
        <ul class="nav navbar-nav navbar-right">
          @if(Session::has('user'))
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Session::get('user')['name']}}
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/logout">Logout</a></li>
              </ul>
            @else
            <li><a href="/login">Login</a></li>
            @endif
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>