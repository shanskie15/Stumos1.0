@extends('admin.admin_layout')

@section('content-body')

<div class="card">
  <div class="card-header">{{__('Deleted Employee')}}</div>
    <div class="card-body">
      <table class="table display row-border" id="employeesTable">
        <thead>
            <tr>
                <th>ID Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr id="{{$employee->id}}">
                  <td data-label="ID Number">{{$employee->idnumber}}</td>
                  <td data-label="Name">{{$employee->lastname}}, {{$employee->firstname}} {{$employee->middlename[0]}}</td>
                  <td data-label="Email">{{$employee->email}}</td>
                  <td data-label="Employee Type"><p class="text-uppercase">{{$employee->personnel_type}}</p></td>
                  <td data-label="Action">
                      <button class="btn btn-sm btn-primary" onclick="recoverEmployee({{$employee->id}},this)"><i class="fas fa-address-card"></i> Recover</button>
                      <button class="btn btn-sm btn-danger" onclick="destroyEmployee({{$employee->id}},this)"><i class="fas fa-trash-alt"></i> Delete</button>
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
