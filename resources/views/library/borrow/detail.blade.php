 @extends('master')
@section("content")
   <div class="container">
    <div class="row">
        <div class="col-sm-6">
           
        </div>
        <div class="col-sm-6">
            <a href="/index"><button class="btn btn-primary">Back</button></a>
            @foreach ($borrows as $borrow)   
                      
                  <h2>Book Name:{{$borrow->bookname}}</h2>
                  <h3>Borrowers Name:{{$borrow->lastname}} {{$borrow->firstname}}</h3>
                  <h4>Details:{{$borrow->description}}</h4>
            <br><br>
            <form action="/returned"  method="POST">
                @csrf
           
            <input type="hidden"  value="{{$borrow->borrows_id}}" name="borrows_id">
            <input type="hidden"  value="{{$borrow->id}}" name="id">
            <input type="hidden"  value="{{$borrow->student_id}}" name="student_id">
            <input type="hidden"  value="{{$borrow->bookname}}" name="bookname">
            <input type="hidden"  value="{{$borrow->description}}" name="description">
            <input type="hidden"  name="user_id" value=" {{ Auth::user()->id}}">
            <input type="hidden"  value="1" name="deleted">

            <button class="btn btn-success">Book Returned</button>
            </form>
            
            @endforeach
           
            
            <br><br>
            <button class="btn btn-danger">Block Student</button>
            <br><br>
        </div>
    </div>
   </div>
@endsection