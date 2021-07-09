<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\Stream;
use App\Models\Teacher;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use App\Models\StandardSubject;
use Illuminate\Http\Request;

class StandardSubjectController extends Controller
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
        $subs = StandardSubject::with('school','teacher','subject','stream',)->latest()->get();

        return view('admin.subs.index',compact('subs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subjects = Subject::all();
        $streams = Stream::all();
        $teachers = Teacher::all();

        return view('admin.subs.create',compact('subjects','streams','teachers'));
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
        $input['subject_id'] = $request->subject;
        $input['school_id'] = auth()->user()->school->id;
        $input['stream_id'] = $request->stream;
        $input['teacher_id'] = $request->teacher;
        $sub = StandardSubject::create($input);

        return redirect()->route('admin.subs.index')->withSuccess(ucwords($sub->desc." ".'subject created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StandardSubject  $standardSubject
     * @return \Illuminate\Http\Response
     */
    public function show(StandardSubject $sub)
    {
        //
        return view('admin.subs.show',compact('sub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StandardSubject  $standardSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(StandardSubject $sub)
    {
        //
        $subjects = Subject::all();
        $streams = Stream::all();
        $teachers = Teacher::all();

        return view('admin.subs.edit',compact('sub','subjects','streams','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StandardSubject  $standardSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StandardSubject $sub)
    {
        //
        $input = $request->all();
        $input['subject_id'] = $request->subject;
        $input['school_id'] = auth()->user()->school->id;
        $input['stream_id'] = $request->stream;
        $input['teacher_id'] = $request->teacher;
        $sub->update($input);

        return redirect()->route('admin.subs.index')->withSuccess(ucwords($sub->desc." ".'subject updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StandardSubject  $standardSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(StandardSubject $sub)
    {
        //
        $sub->delete();

        return redirect()->route('admin.subs.index')->withSuccess(ucwords($sub->desc." ".'subject deleted successfully'));
    }
}
