@extends('library.library_layout')

@section('library-body')


<div class="card" style="margin:2%;">
 
  
  <div class="card-body">
  <h3>Borrow List</h3>
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
              <tr>
                @foreach($borrows as $borrow)
                <td>
                  {{$borrow->bookname}}
                </td>
                <td>
                  {{$borrow->lastname}}, {{$borrow->firstname}}
                </td>
                <td>
                {{-- {{$users['user_id']}} --}}
                {{$borrow->date_return}}
                </td>
                <td>
                <button class="btn btn-sm btn-primary"><i class="far fa-list-bars"></i>View</button>
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
@section('js')
    @include('inc.library.borrow_table')
@endsection
