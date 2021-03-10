@extends('master')
@section("content")
   <div class="container">
    <div class="row">
        <div class="col-sm-6">
            {{-- <img class="detail-img" src="{{$borrows['gallery']}}" alt=""> --}}
        </div>
        <div class="col-sm-6">
            <a href="/viewreturned"><button class="btn btn-primary">Back</button></a>
            @foreach ($borrows as $borrow)
            <h2>Book Name:{{$borrow->bookname}}</h2>
            <h3>Borrowers Name:{{$borrow->lastname}} {{$borrow->firstname}}</h3>
            <h4>Reminder:{{$borrow->description}}</h4>
            <br><br>
            @endforeach
            
            
        </div>
    </div>
   </div>
@endsection

{{-- @extends('master')
@section("content")
<table class="table-fixed">
    <thead>
      <tr>
        <th class="w-1/2 ...">Image</th>
        <th class="w-1/2 ...">Book Name</th>
        <th class="w-1/4 ...">Borrowers Name</th>
        <th class="w-1/4 ...">Reminder</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$borrows['bookname']}}</td>
        <td>{{$borrows['lname']}} {{$borrows['fname']}}</td>
        <td>{{$borrows['description']}}</td>
      </tr>
     </tbody>
  </table>
  @endsection --}}