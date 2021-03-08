@extends('master')
@section("content")
   <div class="container">
    <div class="row">
        <div class="col-sm-6">
            {{-- <img class="detail-img" src="{{$borrows['gallery']}}" alt=""> --}}
        </div>
        <div class="col-sm-6">
            <a href="/"><button class="btn btn-primary">Back</button></a>
            
            <h2>Book Name:{{$borrows['bookname']}}</h2>
            <h3>Borrowers Name:{{$borrows['student_id']}}</h3>
            <h4>Reminder:{{$borrows['description']}}</h4>
            <br><br>
            
            <form action="/returned"  method="POST">
                @csrf
            {{-- <input type="hidden" name="borrow_id" value="{{$borrows['id']}}"> --}}
            <input type="hidden"  value="{{$borrows['id']}}" name="id">
            <input type="hidden"  value="{{$borrows['student_id']}}" name="student_id">
            <input type="hidden"  value="{{$borrows['bookname']}}" name="bookname">
            <input type="hidden"  value="{{$borrows['description']}}" name="description">
            <input type="hidden"  value="1" name="deleted">

            <button class="btn btn-success">Book Returned</button>
            </form>
            
            <br><br>
            <button class="btn btn-danger">Block Student</button>
            <br><br>
        </div>
    </div>
   </div>
@endsection