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
   
    public function index(){

       
        $deleted='0';
        $borrows=DB::table('borrows')
        ->join('students','borrows.student_id','=','students.id')
        ->where('borrows.deleted',$deleted)
        ->select('borrows.*','students.*','borrows.id as borrows_id')
        ->get(); 
        
        
        return view('library.borrow.borrow',['borrows'=>$borrows]); 


    }
    function detail($id)
    {
       
        $borrows=DB::table('borrows')
        ->join('students','borrows.student_id','=','students.id')
        ->where('borrows.id',$id)
        ->select('borrows.*','students.*','borrows.id as borrows_id')
        ->get(); 

        return view('library.borrow.detail',['borrows'=>$borrows]);
    }
    function returneddetail($id)
    {
        
        $borrows=DB::table('borrows')
        ->join('students','borrows.student_id','=','students.id')
        ->where('borrows.id',$id)
        ->select('borrows.*','students.*','borrows.id as borrows_id')
        ->get(); 

       
        return view('library.borrow.returneddetail',['borrows'=>$borrows]);
    }
    function search(Request $req)
    {
        
       $data = Borrow::where('bookname','like','%'.$req->input('query').'%')->get();
       return view('library.borrow.search',['borrows'=>$data]);
    }       
    function returned(Request $req)
    {       
       
            
        
            Borrow::destroy($req->borrows_id);


            $returned = new Borrow;
            $returned->user_id=$req->user_id;
            $returned->student_id=$req->student_id;
            $returned->bookname=$req->bookname;
            $returned->description=$req->description;
            $returned->deleted=$req->deleted;
            $returned->save();
            return redirect('/viewreturned');
    
    }
    Static function returnedBook()
    {

        $userId=Session::get('user')['id'];
        
      
        return Returned::where('user_id',$userId)->count();

    }
    function viewreturned(){
               
        

        $deleted='1';
      
        
        $borrow=DB::table('borrows')
        ->join('students','borrows.student_id','=','students.id')
        ->where('borrows.deleted',$deleted)
        ->select('borrows.*','students.*','borrows.id as borrows_id')
        ->get(); 
       
        return view('library.borrow.viewreturned',['borrow'=>$borrow]); 
    }
    function removedreturned($id){
        
        Borrow::destroy($id);

        return redirect('/viewreturned');

    }
   
   
    function getaddborrow(){

         
        
        $data = Student::all();
        
        return view('library.borrow.addborrow',['students'=>$data]); 


    }

    function addborrow(Request $req)
    {                     
            $borrow = new Borrow;
            $borrow->user_id=$req->user_id;
            $borrow->student_id=$req->student_id;
            $borrow->bookname=$req->bookname;
            $borrow->description=$req->description;
            $borrow->date_return=$req->date_return;
            $borrow->save();
            return redirect('/index');          
    }
}



