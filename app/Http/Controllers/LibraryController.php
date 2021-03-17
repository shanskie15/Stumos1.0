<?php

namespace App\Http\Controllers;

use App\Library;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Borrow;
use DB;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index() // Scan Student
    {   
        return view('library.library_home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function borrowindex()
    {
        $deleted='0';
        $borrows=DB::table('borrows')
        ->join('students','borrows.student_id','=','students.id')
        ->where('borrows.deleted',$deleted)
        ->select('borrows.*','students.*','borrows.id as borrows_id')
        ->get(); 
        
        return view('library.borrow.index',['borrows'=>$borrows]); 
    }

    public function create()
    {
        $data = Student::all();
        return view('library.borrow.create',['students'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $borrow = new Borrow;
            $borrow->user_id=$request->user_id;
            $borrow->student_id=$request->student_id;
            $borrow->bookname=$request->bookname;
            $borrow->description=$request->description;
            $borrow->date_return=$request->date_return;
            $borrow->save();

            return redirect()->route('borrow.index');       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $borrows=DB::table('borrows')
        ->join('students','borrows.student_id','=','students.id')
        ->where('borrows.id',$id)
        ->select('borrows.*','students.*','borrows.id as borrows_id')
        ->get(); 

        return view('library.borrow.detail',['borrows'=>$borrows]);
    }
    public function viewreturned()
    {
        $deleted='1';
      
        
        $borrow=DB::table('borrows')
        ->join('students','borrows.student_id','=','students.id')
        ->where('borrows.deleted',$deleted)
        ->select('borrows.*','students.*','borrows.id as borrows_id')
        ->get(); 
        
        return view('library.borrow.viewreturned',['borrow'=>$borrow]); 
    }
    public function returned(Request $request)
    {
            Borrow::destroy($request->borrows_id);

            $returned = new Borrow;
            $returned->user_id=$request->user_id;
            $returned->student_id=$request->student_id;
            $returned->bookname=$request->bookname;
            $returned->description=$request->description;
            $returned->deleted=$request->deleted;
            $returned->save();

            return redirect()->route('borrow.viewreturned');   
    }
    public function removedreturned($id){
        
        Borrow::destroy($id);

        return redirect()->route('borrow.viewreturned');   

    }
    public function returneddetail($id)
    {
        
        $borrows=DB::table('borrows')
        ->join('students','borrows.student_id','=','students.id')
        ->where('borrows.id',$id)
        ->select('borrows.*','students.*','borrows.id as borrows_id')
        ->get(); 

       
        return view('library.borrow.returneddetail',['borrows'=>$borrows]);
    }

}
