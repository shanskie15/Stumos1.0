<div class="container emp-profile">
  <form>
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
                        <h6>
                          {{$employee->position}}
                        </h6>
                        <p class="proile-rating">AGENT</p>
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
          <button type="button" class="profile-edit-btn" onclick="editEmployee({{$employee->id}},null)">Edit</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <p>DIVISIONS</p>
            </div>
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
                  <div class="row">
                      <div class="col-md-6">
                          <label>Salary</label>
                      </div>
                      <div class="col-md-6">
                          <p>₱ {{number_format($employee->salary)}} / mo</p>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </form>           
</div>