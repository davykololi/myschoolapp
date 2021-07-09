<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\Stream;
use App\Models\Year;
use App\Models\Term;
use App\Models\CategoryExam;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamController extends Controller
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
        $exams = Exam::with('teachers','students','schools','streams','category_exam')->latest()->get();

        return view('admin.exams.index',['exams'=>$exams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subjects = Subject::pluck('name','id');
        $streams = Stream::all();
        $examCategories = CategoryExam::all();
        $years = Year::all();
        $terms = Term::all();

        return view('admin.exams.create',compact('subjects','streams','examCategories','years','terms')); 
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
        $input['category_exam_id'] = $request->exam_category;
        $input['school_id'] = Auth::user()->school->id;
        $input['year_id'] = $request->year;
        $input['term_id'] = $request->term;
        $exam = Exam::create($input);
        $subjectId = $request->subject;
        $exam->subjects()->sync($subjectId);
        $streamId = $request->stream;
        $exam->streams()->sync($streamId);

        return redirect()->route('admin.exams.index')->withSuccess('The exam created successfully');
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
        $exam = Exam::findOrFail($id);
        $subjects = Subject::all();
        $examSubjects = $exam->subjects;

        return view('admin.exams.show',['exam'=>$exam,'subjects'=>$subjects,'examSubjects'=>$examSubjects]);
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
        $exam = Exam::findOrFail($id);
        $subjects = Subject::all();
        $streams = Stream::all();
        $examCategories = CategoryExam::all();
        $years = Year::all();
        $terms = Term::all();

        return view('admin.exams.edit',compact('exam','subjects','streams','examCategories','years','terms'));
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
        $exam = Exam::findOrFail($id);
        $input = $request->only(['name','start_date','end_date']);
        $input['category_exam_id'] = $request->exam_category;
        $input['school_id'] = Auth::user()->school->id;
        $input['year_id'] = $request->year;
        $input['term_id'] = $request->term;
        $exam->update($input);
        $subjectId = $request->subject;
        $exam->subjects()->sync($subjectId);
        $streamId = $request->stream;
        $exam->streams()->sync($streamId);

        return redirect()->route('admin.exams.index')->withSuccess('The exam updated successfully');
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
        $exam = Exam::findOrFail($id);
        $exam->delete();
        $exam->schools()->detach();
        $exam->subjects()->detach();
        $exam->streams()->detach();
        $exam->subjects()->detach();

        return redirect()->route('admin.exams.index')->withSuccess('The exam deleted successfully');
    }
}
