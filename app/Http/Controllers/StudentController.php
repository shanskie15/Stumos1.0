<?php

namespace App\Http\Controllers;

use App\Student;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the students
     *
     * @param  \App\student  $model
     * @return \Illuminate\View\View
     */
    public function index(Student $model)
    {
        $users = User::where('personnel_type','teacher')->get();
        $sections = Section::all();
        return view('admin.student.index', ['students' => $model->paginate(15)], compact('users','sections'));
    }

    /**
     * Show the form for creating a new student
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created student in storage
     *
     * @param  \App\Http\Requests\studentRequest  $request
     * @param  \App\student  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {   
        $student = Student::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'year' => $request->year,
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'parent_name' => $request->parent_name,
            'pcontact' => $request->pcontact,
            'section_id' => $request->section_id,
        ]);

        return redirect()->route('student.index');
    }

    /**
     * Show the form for editing the specified student
     *
     * @param  \App\student  $student
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $users = User::where('personnel_type','teacher')->get();
        $sections = Section::all();
        return view('admin.student.edit', compact('student','users','sections'));
    }

    /**
     * Update the specified student in storage
     *
     * @param  \App\Http\Requests\studentRequest  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required',
            'middle_name'=>'required',
            'last_name'=>'required'
        ]);
        $student = Student::find($id);
        $student->first_name = $request->get('first_name');
        $student->middle_name = $request->get('middle_name');
        $student->last_name = $request->get('last_name');
        $student->contact = $request->get('contact');
        $student->year = $request->get('year');
        $student->parent_name = $request->get('parent_name');
        $student->pcontact = $request->get('pcontact');
        $student->section_id = $request->get('section_id');
        $student->save();
        
        return redirect()->route('student.index')->with('success','student updated successfully');
    }

    /**
     * Remove the specified student from storage
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student Account deleted!');
    }
}