@extends('admin.admin_layout')
@section('css')
    
@endsection
@section('content-body')
<div class="row" style="margin:2%;">
  <div class="col-sm-2 col-md-4 col-lg-2">
      <a href="{{ route('employees.export')}}"><button class="btn btn-primary">Export Employee</button></a>
  </div>
  <div class="col-sm-2 col-md-4 col-lg-2">
      <a href="#" class="btn btn-sm btn-success float-right" id="import" data-toggle="modal" data-target="#bigModal">Import Employee</a>
  </div>
</div>
<div class="card" style="margin:2%;">
  <div class="card-header">
    <div class="row">
      <div class="col-sm-10 col-md-8 col-lg-10">
        <h3>Employees</h3>
      </div>
      <div class="col-sm-2 col-md-4 col-lg-2">
        <a href="{{route('employees.create')}}"><button class="btn btn-primary">Create Employee</button></a>
      </div>
    </div>
  </div>
  <div class="card-body col-sm-12 col-md-12 col-lg-12">
    <table class="display row-border" id="employeesTable">
      <thead>
        <tr>
          <th>Name</th>
          <th style="width:=15%">Email</th>
          <th>Type</th>
          <th style="width:=25%">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employees as $employee)
          @if($employee->delete != 1)
            <tr id="{{$employee->id}}">
              <td>{{$employee->lastname}}, {{$employee->firstname}} {{$employee->middlename[0]}}</td>
              <td>{{$employee->email}}</td>
              <td class="text-uppercase">{{$employee->personnel_type}}</td>
              <td>
                <button class="btn btn-sm btn-primary" onclick="viewEmployee({{$employee->id}})" data-target="#bigModal" data-toggle="modal"><i class="far fa-list-alt"></i>View</button>
                <a href="{{route('employees.edit', $employee->id)}}"><button class="btn btn-sm btn-success"><i class="fas fa-edit"></i>Edit</button></a>
                <button onclick="deleteEmployee({{$employee->id}},this)" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i>Delete</button>
              </td>
            </tr>
          @endif
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