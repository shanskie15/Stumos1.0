@extends('librarian.librarian_layout')

@section('content-body')
<div class="row admin-row">
    <a href="{{route('librarian.index')}}" class="admin-card col-lg-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Added Borrow</h5>
                <h1>21</h1>
            </div>
        </div>
    </a>
    <a href="{{route('student.index')}}" class="admin-card col-lg-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Returned Book</h5>
                <h1>21</h1>
            </div>
        </div>
    </a>
    <a href="{{route('section.index')}}" class="admin-card col-lg-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">History</h5>
                <h1>21</h1>
            </div>
        </div>
    </a>
</div>
@endsection