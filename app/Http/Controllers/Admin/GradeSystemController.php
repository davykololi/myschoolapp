<?php

namespace App\Http\Controllers\Admin;

use App\Models\GradeSystem;
use App\Models\Student;
use App\Models\Stream;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\Staff;
use App\Models\Librarian;
use App\Models\Matron;
use App\Models\Accountant;
use App\Models\MyClass;
use App\Models\MyParent;
use App\Models\Dormitory;
use App\Models\Subject;
use App\Models\StandardSubject;
use App\Rules\AllowedMark;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GradeSystemController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gradeSystems = GradeSystem::all();

        return view('admin.grade-systems.index',compact('gradeSystems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $students = Student::all();
        $streams = Stream::all();
        $departments = Department::all();
        $teachers = Teacher::all();
        $staffs = Staff::all();
        $librarians = Librarian::all();
        $matrons = Matron::all();
        $accountants = Accountant::all();
        $classes = MyClass::all();
        $parents = MyParent::all();
        $dormitories = Dormitory::all();
        $subjects = Subject::all();
        $standardSubjects = StandardSubject::all();

        return view('admin.grade-systems.create',compact('students','streams','departments','teachers','staffs','librarians','matrons','accountants','classes','parents','dormitories','subjects','standardSubjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
                'points' => 'required',
                'grade' => 'required',
                'from_mark' => ['required'],
                'to_mark' => ['required',],
            ]);
        $input = $request->all();
        $input['school_id'] = auth()->user()->school->id;
        $input['student_id'] = $request->student;
        $input['stream_id'] = $request->stream;
        $input['department_id'] = $request->department;
        $input['teacher_id'] = $request->teacher;
        $input['staff_id'] = $request->staff;
        $input['librarian_id'] = $request->librarian;
        $input['matron_id'] = $request->matron;
        $input['accountant_id'] = $request->accountant;
        $input['class_id'] = $request->class;
        $input['parent_id'] = $request->parent;
        $input['dormitory_id'] = $request->dormitory;
       	$input['subject_id'] = $request->subject;
       	$input['standard_subject_id'] = $request->standard_subject;
       	$gradeSystem = GradeSystem::create($input);

       	return redirect()->route('admin.grade-systems.index')->withSuccess(ucwords($gradeSystem->grade." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $gradeSystem = GradeSystem::findOrFail($id);

        return view('admin.grade-systems.show',compact('gradeSystem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $gradeSystem = GradeSystem::findOrFail($id);
        $students = Student::all();
        $streams = Stream::all();
        $departments = Department::all();
        $teachers = Teacher::all();
        $staffs = Staff::all();
        $librarians = Librarian::all();
        $matrons = Matron::all();
        $accountants = Accountant::all();
        $classes = MyClass::all();
        $parents = MyParent::all();
        $dormitories = Dormitory::all();
        $subjects = Subject::all();
        $standardSubjects = StandardSubject::all();

        return view('admin.grade-systems.edit',compact('gradeSystem','students','streams','departments','teachers','staffs','librarians','matrons','accountants','classes','parents','dormitories','subjects','standardSubjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $gradeSystem = GradeSystem::findOrFail($id);
        $request->validate([
                'point' => 'required',
                'grade' => 'required',
                'from_mark' => ['required',new AllowedMark],
                'to_mark' => ['required',new AllowedMark],
            ]);
        $input = $request->all();
        $input['school_id'] = auth()->user()->school->id;
        $input['student_id'] = $request->student;
        $input['stream_id'] = $request->stream;
        $input['department_id'] = $request->department;
        $input['teacher_id'] = $request->teacher;
        $input['staff_id'] = $request->staff;
        $input['librarian_id'] = $request->librarian;
        $input['matron_id'] = $request->matron;
        $input['accountant_id'] = $request->accountant;
        $input['class_id'] = $request->class;
        $input['parent_id'] = $request->parent;
        $input['dormitory_id'] = $request->dormitory;
       	$input['subject_id'] = $request->subject;
       	$input['standard_subject_id'] = $request->standard_subject;
       	$gradeSystem->update($input);

       	return redirect()->route('admin.grade-systems.index')->withSuccess(ucwords($gradeSystem->grade." ".'info updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $gradeSystem = GradeSystem::findOrFail($id);
        $gradeSystem->delete();

        return redirect()->route('admin.grade-systems.index')->withSuccess(ucwords($gradeSystem->grade." ".'info deleted successfully'));
    }
}
