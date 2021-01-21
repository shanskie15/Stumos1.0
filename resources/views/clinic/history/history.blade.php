@extends('clinic.clinic_layout')
@section('css')
    
@endsection
@section('clinic-body')
<div class="card" style="margin:2%;">
  <div class="card-header">
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10">
          Consultation History 
        </div>
        <!-- <div class="col-sm-2 col-md-2 col-lg-2">
          <a href=""><button class="btn btn-primary">Create Student</button></a>
        </div> -->
      </div>
    </div>
  <div class="card-body">
    <div class="row">
      <div class="table-responsive">
        <table class="table" id="studentTable">
          <thead class="text-primary">
            <th>ID</th>
            <th>Name</th>
            <th>Year</th>
            <th>Section</th>
            <th>Consultation</th>
            <th>Time In</th>
            <th>Time Out</th>
            <!-- <th style="width:30%">Actions</th> -->
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
