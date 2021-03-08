@extends('master')
@section("content")
   <div class="container custom-borrow">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        <h3>Borrowers</h3>
        <div class="carousel-inner">
            @foreach($borrows as $item)
            @if($item->deleted != 1)
          <div class="item {{$item['id']==1?'active':''}}">
            <a href="detail/{{$item['id']}}">
                {{-- <img src="{{$item['gallery']}}" alt="Chania"> --}}
                <div class="carousel-caption slider-text">
                  <h3>Borrowers Name:{{$item['student_id']}} </h3>
                  <h3>Librarian Name:{{$item['user_id']}} </h3>
                  <h3>Book Name:{{$item['bookname']}} </h3>
                  <p>Reminder:{{$item['description']}}</p>
                </div></a>
          </div>
          @endif
           @endforeach
        </div>
      
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="trending-wrapper">
        <h3>Past Deadline</h3>
            @foreach($borrows as $item)
            @if($item->deleted != 1)
          <a href="detail/{{$item['id']}}">
            <div class="trending-item">
                {{-- <img class="trending-image" src="{{$item['gallery']}}" alt="Chania"> --}}
                <div class="">
                  <h3>Student ID: {{$item['student_id']}} </h3>
                  <h3>Librarian ID:{{$item['user_id']}} </h3>
                  <h3>Book Name:{{$item['bookname']}} </h3>
                  <p>Reminder:{{$item['description']}}</p>
                </div>
              </div>
          </a>
          @endif
           @endforeach
        
      </div>
   </div>
@endsection