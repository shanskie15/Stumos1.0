@extends('master')
@section("content")
   <div class="container custom-borrow">
       <div class="col-sm-4">
           <a href="#">Filter</a>
       </div>
        <div class="col-sm-4">
          <div class="trending-wrapper">
            <a href="/"><button class="btn btn-primary">Back</button></a>
            <h3>Search Results</h3>
                @foreach($borrows as $item)
              <a href="detail/{{$item['id']}}">
                <div class="searched-item">
                  
                    <img class="trending-image" src="{{$item['gallery']}}" alt="Chania">
                    <div class="">
                      <p>Borrowers Name: {{$item['fname']}} {{$item['lname']}}  </p>
                      <p>Book Name: {{$item['bookname']}} </p>
                      <p>Reminder: {{$item['description']}} </p>
                      
                    </div>
                  </div>
              </a>
               @endforeach
            </div>
        </div>
   </div>
@endsection