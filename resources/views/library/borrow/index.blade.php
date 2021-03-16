@extends('library.library_layout')

@section('library-body')
<div class="container custom-borrow">
   
  <div class="trending-wrapper">
    <h3>Borrows</h3>
        @foreach($borrows as $borrow)
        @if($borrow->deleted != 1)
      <a href="detail/{{$borrow->borrows_id}}">
        <div class="trending-item">
            
                  
              <h4>Book Name:{{$borrow->bookname}}</h4>
              <h4>Borrowers Name:{{$borrow->lastname}} {{$borrow->firstname}}</h4>
              <h4>Date to be returned:{{$borrow->date_return}}</h4>
              <br><br>

              
            </div>
          </div>
      </a>
      @endif
       @endforeach
    
  </div>
</div>
@endsection