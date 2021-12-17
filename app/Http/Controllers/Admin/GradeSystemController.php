<?php

namespace App\Http\Controllers\Admin;

use App\Models\GradeSystem;;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Year;
use App\Models\Section;
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
        $classes = MyClass::all();
        $years = Year::all();
        $streams = Stream::all();
        $sections = Section::all();

        return view('admin.grade-systems.create',compact('classes','years','streams','sections'));
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
                'to_mark' => ['required'],
            ]);
        $input = $request->all();
        $input['school_id'] = auth()->user()->school->id;
        $input['class_id'] = $request->class;
        $input['year_id'] = $request->year;
        $input['stream_id'] = $request->stream;
        $input['section_id'] = $request->section;
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
        $classes = MyClass::all();
        $years = Year::all();
        $streams = Stream::all();
        $sections = Section::all();

        return view('admin.grade-systems.edit',compact('classes','years','streams','sections'));
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
                'points' => 'required',
                'grade' => 'required',
                'from_mark' => 'required',
                'to_mark' => ['required'],
            ]);
        $input = $request->all();
        $input['school_id'] = auth()->user()->school->id;
        $input['class_id'] = $request->class;
        $input['year_id'] = $request->year;
        $input['stream_id'] = $request->stream;
        $input['section_id'] = $request->section;
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
