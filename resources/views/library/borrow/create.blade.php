@extends('library.library_layout')

@section('library-body')
<div class="custom-borrow">
    <div class="col-sm-10">
        <h1>Add Borrow</h1>
        <form action="{{route('library.store')}}" method="POST">
            @csrf
            @method('post')
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
              <div class="form-group">
                <label for="formGroupExampleInput2">Date Borrowed</label>
                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="description"  value="{{ date('Y-m-d') }}">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Return Date</label>
                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="description" name="date_return" value="{{ now()->addDays(7)->format('Y-m-d') }}">
              </div>
              <button class="btn btn-success">Borrow</button>
            </form>
          </form>  
     </div>
</div>
@endsection