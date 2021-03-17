@extends('counselor.counselor_layout')

@section('counselor-body')
  <div class="card" style="margin:2%;">
      <div class="card-header">
        <div>
          <a href="{{route('studentprofile', $student->id)}}"><button class="btn btn-primary" style="float:right;">Back</button></a>
        </div>
        <div>
            <h2>{{$student->lastname}}, {{$student->firstname}} {{$student->middlename}}</h2>
            <h2 class="text-uppercase">{{$student->year}}</h2>
            <h2>{{$student->id}}</h2>
        </div>
      </div>
      @include('counselor.student.nav')
      <div class="card-body">
      <h3>List of Counselling Sessions</h3>
      <div class="row">
        <div class="table-responsive">
          <table class="table" id="studentTable">
            <thead class="text-primary">
              <th>Student ID</th>
              <th>Date Created</th>
              <th>Created By</th>
              <th style="width:30%">Actions</th>
            </thead>
            <tbody>
                  <tr>
                    @foreach($datas as $data)
                    <td>
                    {{$data->student_id}}   
                    </td>
                    <td>
                    {{$data->created_at}}
                    </td>
                    <td>
                    {{-- {{$users['user_id']}} --}}
                    {{$data->lastname}}, {{$data->firstname}}
                    </td>
                    <td>
                      <button class="btn btn-sm btn-primary" onclick="viewDesc({{$data->student_id}})" data-target="#bigModal" data-toggle="modal"><i class="fas fa-address-card"></i>View</button>
                    </td>
                  </tr>
                  @endforeach   
            </tbody>
          </table>
        </div>
      </div>
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
@include('inc.counselor.counselling')
@endsection