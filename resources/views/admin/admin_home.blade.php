@extends('admin.admin_layout')

@section('content-body')
<div class="row admin-row">
    <a href="{{route('employees.index')}}" class="admin-card col-lg-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Personnel</h5>
                <h1>21</h1>
            </div>
        </div>
    </a>
    <a href="{{route('admin.index')}}" class="admin-card col-lg-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Student</h5>
                <h1>21</h1>
            </div>
        </div>
    </a>
    <a href="{{route('admin.index')}}" class="admin-card col-lg-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Section</h5>
                <h1>21</h1>
            </div>
        </div>
    </a>
</div>
@endsection