@extends('library.library_layout')

@section('library-body')

<div class="card" style="margin:2%;">
 
  
  <div class="card-body">
  <h3>Returned Books</h3>
  <div class="row">
    <div class="table-responsive">
      <table class="table" id="borrowTable">
        <thead class="text-primary">
          <th>Book Name</th>
          <th>Borrowers Name</th>
          <th>Date to be returned</th>
          <th style="width:30%">Actions</th>
        </thead>
        <tbody>
          @foreach($borrow as $return)
          
              <tr>
                <td>
                  <a href="returneddetail/{{$return->borrows_id}}">
                  {{$return->bookname}}
                </a> 
                </td>
                <td>
                  {{$return->lastname}}, {{$return->firstname}}
                </td>
                <td>
                {{-- {{$users['user_id']}} --}}
                {{$return->date_return}}
                </td>
                <td>
                  <a href="/removereturned/{{$return->borrows_id}}"><button class="btn btn-sm btn-primary"><i class="far fa-list-bars"></i>Remove</button></a>
                
                </td>
              </tr>
          
              @endforeach   
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>

{{-- /// --}}
@endsection

