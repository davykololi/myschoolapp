<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\Subject;
use App\Models\Department;
use App\Models\CategorySubject;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
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
        $subjects = Subject::with('teachers','students','school','department','category_subject')->latest()->get();

        return view('admin.subjects.index',['subjects'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Department::all();
        $subjectCategories = CategorySubject::all();

        return view('admin.subjects.create',compact('departments','subjectCategories'));
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
        $input = $request->all();
        $input['code'] = strtoupper(Str::random(15));
        $input['school_id'] = auth()->user()->school->id;
        $input['department_id'] = $request->department;
        $input['category_subject_id'] = $request->subject_category;
        $subject = Subject::create($input);

        return redirect()->route('admin.subjects.index')->withSuccess(ucwords($subject->name." ".'info created successfully'));
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
        $subject = Subject::findOrFail($id);

        return view('admin.subjects.show',['subject'=>$subject]);
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
        $subject = Subject::findOrFail($id);
        $departments = Department::all();
        $subjectCategories = CategorySubject::all();

        return view('admin.subjects.edit',compact('subject','departments','subjectCategories'));
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
        $subject = Subject::findOrFail($id);
        $input = $request->only(['name']);
        $input['school_id'] = auth()->user()->school->id;
        $input['department_id'] = $request->department;
        $input['category_subject_id'] = $request->subject_category;
        $subject->update($input);

        return redirect()->route('admin.subjects.index')->withSuccess(ucwords($subject->name." ".'info updated successfully'));
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
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('admin.subjects.index')->withSuccess(ucwords($subject->name." ".'info deleted successfully'));
    }
}
