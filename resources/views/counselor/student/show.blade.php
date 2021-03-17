<div class="container emp-profile">
    {{-- <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <a href="{{ route('employee.index')}}"><button class="btn btn-sm btn-primary" style="float:left; margin-bottom:10px;">Back</button></a>
            <a href="{{ route('employee.edit', $employee->id) }}"><button class="btn btn-sm btn-primary" style="float: right;">Edit</button></a>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="row">
                    <div class="col-md-6">
                        <label>Description of Record</label>
                    </div>
                    <div class="col-md-6">
                        @foreach($counsellings as $coun)
                        <p>{{$coun->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>     
</div>