<div class="container emp-profile">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <a href="{{ route('employee.index')}}"><button class="btn btn-sm btn-primary" style="float:left; margin-bottom:10px;">Back</button></a>
            <a href="{{ route('employee.edit', $employee->id) }}"><button class="btn btn-sm btn-primary" style="float: right;">Edit</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 col-md-5 col-lg-5">
            <div class="profile-img">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
            </div>
        </div>
        <div class="col-sm-7 col-md-7 col-lg-7">
            <div class="profile-head">
                <h5>
                    {{$employee->firstname}} {{$employee->middlename[0]}}. {{$employee->lastname}}
                </h5>
                <h6 class="text-uppercase">
                    {{$employee->personnel_type}}
                </h6>
                <p class="proile-rating">EMPLOYEE</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10">
            <div class="tab-content profile-tab" id="myTabContent">
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
                    <p>{{date('F j, Y',strtotime($employee->birthdate))}}</p>
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