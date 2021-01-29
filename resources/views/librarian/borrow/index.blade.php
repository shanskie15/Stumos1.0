@extends('librarian.librarian_layout')
@section('css')
    
@endsection
@section('content-body')
<div class="card" style="margin:2%;">
  <div class="card-header">
    <div class="row">
      <div class="col-sm-10 col-md-10 col-lg-10">
        <p>Borrowers</p>
      </div>
      <div class="col-sm-2 col-md-2 col-lg-2">
        <a href="{{route('librarian.create')}}"><button class="btn btn-primary">Create Borrow</button></a>
      </div>
    </div>
  </div>
  
  <div class="card-body">
    <table class="display row-border" id="borrowTable">
      <thead>
        <tr>
          <th>Student Name</th>
          <th>Book Name</th>
          <th>contact</th>
          <th>Date to be Returned</th>
          
          <th style="width:30%">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($borrows as $borrow)
       
          <tr id="{{$borrow->id}}">
            <td>{{$borrow->lname}}, {{$borrow->fname}} {{$borrow->mname}}</td>
            <td>{{$borrow->bookname}}</td>
            <td>{{$borrow->contact}}</td>
            <td>{{$borrow->datetoreturn}}</td>
            <td>
              <button onclick="" class="btn btn-primary" data-target="#bigModal" data-toggle="modal"><i class="far fa-list-alt"></i>View</button>
              <button onclick="editBorrow({{$borrow->id}},this)" class="btn btn-success" data-target="#bigModal" data-toggle="modal"><i class="fas fa-edit"></i>Edit</button>
              <button onclick="deleteBorrow({{$borrow->id}},this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</button>
              {{-- viewEmployee({{$employee->id}})
              editEmployee({{$employee->id}},this)
              deleteEmployee({{$employee->id}},this) --}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header card-header" style="background-color:#108790;color:white">
        <h5 class="modal-title" id="modalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body card-body" id="modalBody"></div>
      <div class="modal-footer card-footer" style="background-color:#108790;color:white">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelNormal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveNormal">Save changes</button>
        
      </div>
    </div>
  </div>
</div>

{{-- Big modal --}}
<div class="modal fade" id="bigModal" tabindex="-1" role="dialog" aria-labelledby="bigModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bigModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bigModalBody"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelBig">Cancel</button>
        <button type="button" id="saveBig" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection


@section('js')
@include('inc.employees')
@endsection