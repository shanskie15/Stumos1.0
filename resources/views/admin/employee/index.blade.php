@extends('admin.admin_layout')

@section('content-body')
<div class="card" style="margin-bottom: 10px;">
    <div class="card-header">
        {{__('Import Employee')}}
    </div>
    <div class="card-body">
        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        @if (session()->has('failures'))
                <table class="table table-danger">
                    <tr>
                        <th>Row</th>
                        <th>Attribute</th>
                        <th>Errors</th>
                        <th>Value</th>
                    </tr>
                    @foreach (session()->get('failures') as $validation)
                        <tr>
                            <td>{{$validation->row()}}</td>
                            <td>{{$validation->attribute()}}</td>
                            <td>
                                <ul>
                                    @foreach ($validation->errors() as $e)
                                        <li>{{$e}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{$validation->values()[$validation->attribute()]}}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        <form action="{{ route('employee.import') }}" method="post" enctype="multipart/form-data" id="employee-import">
            @csrf
            @method('post')
            <div class="form-group">
                <input type="file" name="excel" />
                <button type="submit" class="btn btn-primary">Import File</button>
            </div>
        </form>
    </div>
</div>
<div class="card">
  <div class="card-header">{{__('Employee')}}</div>
    <div class="card-body">
      <table class="table display row-border" id="employeesTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr id="{{$employee->id}}">
                  <td data-label="Name">{{$employee->lastname}}, {{$employee->firstname}} {{$employee->middlename[0]}}</td>
                  <td data-label="Email">{{$employee->email}}</td>
                  <td data-label="Employee Type"><p class="text-uppercase">{{$employee->personnel_type}}</p></td>
                  <td data-label="Action">
                      <button class="btn btn-sm btn-primary" onclick="viewEmployee({{$employee->id}})" data-target="#bigModal" data-toggle="modal"><i class="fas fa-address-card"></i>View</button>
                      <a href="{{route('employee.edit', $employee->id)}}"><button class="btn btn-sm btn-success"><i class="fas fa-edit"></i>Edit</button></a>
                      <button onclick="deleteEmployee({{$employee->id}},this)" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i>Delete</button>
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
@include('inc.admin.employee')
@endsection
