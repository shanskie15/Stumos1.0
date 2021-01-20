@extends('admin.admin_layout')
@section('css')
    
@endsection
@section('content-body')
<div class="card" style="margin:2%;">
  <div class="card-header">
    <div class="row">
      <div class="col-sm-10 col-md-10 col-lg-10">
        <p>Employees</p>
      </div>
      <div class="col-sm-2 col-md-2 col-lg-2">
        <a href="{{route('employees.create')}}"><button class="btn btn-primary">Create Employee</button></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <table class="display row-border" id="employeesTable">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Type</th>
          <th style="width:30%">Action</th>
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
                <a href="{{route('employees.show', $employee->id)}}"><button class="btn btn-primary"><i class="far fa-list-alt"></i>View</button></a>
                <a href="{{route('employees.edit', $employee->id)}}"><button class="btn btn-success"><i class="fas fa-edit"></i>Edit</button></a>
                <button onclick="deleteEmployee({{$employee->id}},this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</button>
              </td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('js')
@include('inc.employees')
@endsection