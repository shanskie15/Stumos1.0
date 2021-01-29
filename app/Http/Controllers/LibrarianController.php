<?php

namespace App\Http\Controllers;

use App\Librarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Borrow;
use DB;

class LibrarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('librarian.librarian_home');
        
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function borrowindex()
    {
         $borrows = Borrow::all();
        return view('librarian.borrow.index',compact('borrows'));
       
		
    }
    public function create()
    {
        return view('librarian.borrow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required',
        ]);
            
        $borrow = Borrow::create([
        'fname'=>$request->fname,
        'mname'=>$request->mname,
        'lname'=>$request->lname,
        'fnamelib'=>$request->fnamelib,
        'contact'=>$request->contact,
        'bookname'=>$request->bookname,
        'datetoreturn'=>$request->datetoreturn,
        ]);  
        return redirect()->route('librarian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $borrow = Borrow::find($id);
		return view('librarian.borrow.show', compact('borrow'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrow = Borrow::find($id);
		return view('librarian.borrow.edit', compact('borrow'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required',
        ]);
            
        $borrow = Borrow::find($id);
        $borrow->fname = $request->fname;
        $borrow->mname = $request->mname;
        $borrow->lname = $request->lname;
        $borrow->fnamelib = $request->fnamelib;
        $borrow->contact = $request->contact;
        $borrow->bookname = $request->bookname;
        $borrow->datetoreturn = $request->datetoreturn;
        $borrow->save();

    
        return redirect()->route('librarian.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrow = Borrow::find($id);
		$borrow->delete();
		return response()->json([
			'status' => 'success',
			'message' => 'Borrow deleted from the database!'
		]);
    }
    public function delete($id)
	{
		$borrow = Borrow::find($id);

		$borrow->deleted = '1';
		$borrow->save();
		return response()->json([
			'status' => 'success',
			'message' => 'Borrow removed from the list.'
		]);
	}
}
