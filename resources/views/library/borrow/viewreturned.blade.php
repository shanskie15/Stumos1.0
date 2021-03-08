 @extends('master')
@section("content")
   <div class="custom-borrow">
    <div class="col-sm-10">
      <div class="trending-warraper">
            <h4>Returned Books</h4>
            @foreach($borrows as $return)
            {{-- @if($return->deleted != 0) --}}
            <div class="row searched-item returned-devider">
              <div class="col-sm-3">
                <a href="returneddetail/{{$return->borrows_id}}">
                  {{-- <img class="trending-image"  src="{{$return->gallery}}" alt="Chania"> --}}
                  <h4>Borrowers Name:{{$return->lastname}},{{$return->firstname}} </h4>
                    <h4>Book Name:{{$return->bookname}} </h4>
                    <h4>deleted:{{$return->deleted}} </h4>
                    <h4>Description: {{$return->description}}</h4>   
                  </a>   
              </div>
              <div class="col-sm-3">
                <a href="/removereturned/{{$return->borrows_id}}"><button  class="btn btn-warning">Remove </button></a>
                
             </div>
              
            </div>
            {{-- @endif --}}
            @endforeach
          </div>
     </div>
</div>
  @endsection