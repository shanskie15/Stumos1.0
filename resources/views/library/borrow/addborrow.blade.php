@extends('master')
@section("content")
   <div class="custom-borrow">
    <div class="col-sm-10">
        <h1>Add Borrow</h1>
        <form action="/addborrow" method="POST">
            @csrf
            <div class="form-group">
              <label for="formGroupExampleInput">Student Name</label>
              
              <select name="student_id" class="form-select" aria-label="Default select example">
               
                <option selected>Select Student</option>
                @foreach($students as $student)
                <option  value="{{$student['id']}}">{{$student['lastname']}},{{$student['firstname']}}</option>
                
                @endforeach
              </select>
              <input type="hidden"  name="user_id" value=" {{ Auth::user()->id}}">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Book Name</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="book name" name="bookname">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Description</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="description" name="description">
              </div>
              <button class="btn btn-success">Add Borrow</button>
            </form>
          </form>  
     </div>
</div>
  @endsection