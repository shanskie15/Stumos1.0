<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\Student;
use App\Returned;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class BorrowController extends Controller

{
    //
    public function index(){

        //$data = Borrow::where('deleted,','0')->get();
        

        $data = Borrow::all();
        // $userId=Session::get('user')['id'];
        // $data=DB::table('borrows')
        // ->join('students','borrows.student_id','=','students.id')
        // ->where('borrows.user_id',$userId)
        // ->select('borrows.*','students.*','borrows.id as borrows_id')
        // ->get(); 
        
        return view('library.borrow.borrow',['borrows'=>$data]); 


    }
    function detail($id)
    {
        $data = Borrow::find($id);
        return view('library.borrow.detail',['borrows'=>$data]);
    }
    function returneddetail($id)
    {
        // $userId=Session::get('user')['id'];
        // $borrows=DB::table('returned')
        // ->join('borrows','returned.borrow_id','=','borrows.id')
        // ->where('returned.user_id',$userId)
        // ->select('borrows.*','returned.id as returned_id')
        // ->get();   
        // return view('returneddetail',['borrows'=>$borrows]); 

        $data = Borrow::find($id);
        return view('library.borrow.returneddetail',['borrows'=>$data]);
    }
    function search(Request $req)
    {
        
       $data = Borrow::where('bookname','like','%'.$req->input('query').'%')->get();
       return view('library.borrow.search',['borrows'=>$data]);
    }       
    function returned(Request $req)
    {       
       
            
        // if($req->session()->has('user'))
        // {               
            // $returned = new Returned;
            // $returned->user_id=$req->session()->get('user')['id'];
            // $returned->borrow_id=$req->borrow_id;
            // $returned->save();
            // return redirect('/');
            Borrow::destroy($req->id);

            $returned = new Borrow;
            $returned->user_id=$req->user_id;
            $returned->student_id=$req->student_id;
            $returned->bookname=$req->bookname;
            $returned->description=$req->description;
            $returned->deleted=$req->deleted;
            $returned->save();
            return redirect('/viewreturned');

        // }else{
        //     return redirect('/login');
        // }     
    }
    Static function returnedBook()
    {

        $userId=Session::get('user')['id'];
        
        // {{ Auth::user()->id}}
        return Returned::where('user_id',$userId)->count();

    }
    function viewreturned(){
               
        
        // $userId=Session::get('user')['id'];
        // print_r($userId);
        // $borrows=DB::table('returned')
        // ->join('borrows','returned.borrow_id','=','borrows.id')
        // ->where('returned.user_id',$userId)
        // ->select('borrows.*','returned.id as returned_id')
        // ->get(); 
        $userId=Auth::user()->id;
       

        $borrows=DB::table('borrows')
        ->join('students','borrows.student_id','=','students.id')
        ->where('borrows.user_id',$userId)
        ->select('borrows.*','students.*','borrows.id as borrows_id')
        ->get(); 

        // return view('')
        // $data = Returned::all();
        dd($borrows);
        return view('library.borrow.viewreturned',compact('borrows')); 
    }
    function removedreturned($id){
        
        Borrow::destroy($id);

        return redirect('/viewreturned');

    }
   
    // function deleted(Request $req)
    // {
    //     $data = new Borrow;
    //     $data = Borrow::find($id); 
    //     $data->deleted = '1';
	// 	$data->save(); 

    //     return redirect('/');
    // }
    function getaddborrow(){

         
        
        $data = Student::all();
        
        return view('library.borrow.addborrow',['students'=>$data]); 


    }

    function addborrow(Request $req)
    {       
       
            
        // if($req->session()->has('user'))
        // {               
            $borrow = new Borrow;
            $borrow->user_id=$req->user_id;
            $borrow->student_id=$req->student_id;
            $borrow->bookname=$req->bookname;
            $borrow->description=$req->description;
            $borrow->save();
            return redirect('/index');

        // }else{
        //     return redirect('/login');
        // }     
    }
}



