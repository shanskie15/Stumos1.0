@extends('librarian.librarian_layout')
@section('css')
    
@endsection
@section('content-body')
<div class="container emp-profile">
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10">
            <a href="{{route('librarian.index')}}"><button class="btn btn-primary" style="float:left; margin-bottom:10px;">Back</button></a>
        </div>
    </div>
    <div class="row">
       
        <div class="col-md-6">
            <div class="profile-head">
                        <h5>
                          {{$borrow->fname}} {{$borrow->mname[0]}}. {{$borrow->lname}}
                        </h5>
                        <h6 class="text-uppercase">
                            {{$borrow->bookname}}
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
                          <label>Contact</label>
                      </div>
                      <div class="col-md-6">
                          <p>{{$borrow->contact}}</p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <label>Date of Return</label>
                      </div>
                      <div class="col-md-6">
                        <p>{{date('F j, Y',strtotime($borrow->datetoreturn))}}</p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <label>Phone</label>
                      </div>
                      <div class="col-md-6">
                        <p>{{$borrow->contact}}</p>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>     
</div>
@endsection