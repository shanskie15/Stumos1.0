@extends('admin.admin_layout')
@section('css')
    
@endsection
@section('content-body')
<div class="container emp-profile">
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10">
            <a href="{{route('employees.index')}}"><button class="btn btn-primary" style="float:left; margin-bottom:10px;">Back</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                <div class="file btn btn-lg btn-primary">
                    Change Photo
                    <input type="file" name="file"/>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                        <h5>
                          {{$employee->firstname}} {{$employee->middlename[0]}}. {{$employee->lastname}}
                        </h5>
                        <h6 class="text-uppercase">
                            {{$employee->personnel_type}}
                        </h6>
                        <p class="proile-rating">EMPLOYEE</p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">More Info</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
          <a href="{{ route('employees.edit', $employee->id) }}"><button class="btn btn-primary">Edit</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                      <div class="col-md-6">
                          <label>E-mail address</label>
                      </div>
                      <div class="col-md-6">
                          <p>{{$employee->email}}</p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <label>Date of Birth</label>
                      </div>
                      <div class="col-md-6">
                        <p>{{date('F j, Y',strtotime($employee->birth_date))}}</p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <label>Address</label>
                      </div>
                      <div class="col-md-6">
                        <p>{{$employee->address}}</p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <label>Phone</label>
                      </div>
                      <div class="col-md-6">
                        <p>{{$employee->contact}}</p>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>     
</div>
@endsection