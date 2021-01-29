<div class="container emp-profile">
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10">
            <a href="{{route('section.index')}}"><button class="btn btn-primary" style="float:left; margin-bottom:10px;">Back</button></a>
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
                @foreach($employees as $employee)
                    @if($section->user_id == $employee->id)
                        <h5>
                            {{$employee->firstname}} {{$employee->middlename[0]}}. {{$employee->lastname}}
                        </h5>
                        <h6 class="text-uppercase">
                            {{$employee->personnel_type}}
                        </h6>
                    @endif
                @endforeach
                        <p class="proile-rating">EMPLOYEE</p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
          <a href="{{ route('section.edit', $section->id) }}"><button class="btn btn-primary">Edit</button></a>
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
                          <label>Section Name</label>
                      </div>
                      <div class="col-md-6">
                          <p>{{$section->section_name}}</p>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <label>Room</label>
                      </div>
                      <div class="col-md-6">
                        <p>{{$section->room_number}}</p>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>     
</div>