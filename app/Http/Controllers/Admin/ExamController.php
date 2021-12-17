<?php

namespace App\Http\Controllers\Admin;

use App\Services\ExamService;
use App\Services\SubjectService;
use App\Services\StreamService;
use App\Services\YearService;
use App\Services\TermService;
use App\Services\ExamCatService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ExamFormRequest as StoreRequest;
use App\Http\Requests\ExamFormRequest as UpdateRequest;

class ExamController extends Controller
{
    protected $examService,$subjectService,$streamService,$yearService,$termService,$examCatService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ExamService $examService,SubjectService $subjectService,streamService $streamService,YearService $yearService,TermService $termService,ExamCatService $examCatService)
    {
        $this->middleware('auth:admin');
        $this->examService = $examService;
        $this->subjectService = $subjectService;
        $this->streamService = $streamService;
        $this->yearService = $yearService;
        $this->termService = $termService;
        $this->examCatService = $examCatService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exams = $this->examService->all();

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
        $subjects = $this->subjectService->all()->pluck('name','id');
        $streams = $this->streamService->all();
        $examCategories = $this->examCatService->all();
        $years = $this->yearService->all();
        $terms = $this->termService->all();

        return view('admin.exams.create',compact('subjects','streams','examCategories','years','terms')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        $exam = $this->examService->create($request);
        $subjectId = $request->subject;
        $exam->subjects()->sync($subjectId);
        $streamId = $request->stream;
        $exam->streams()->sync($streamId);

        return redirect()->route('admin.exams.index')->withSuccess(ucwords($exam->name." ".'info created successfully'));
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
        $exam = $this->examService->getId($id);
        $subjects = $this->subjectService->all();
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
        $exam = $this->examService->getId($id);
        $subjects = $this->subjectService->all();
        $streams = $this->streamService->all();
        $examCategories = $this->examCatService->all();
        $years = $this->yearService->all();
        $terms = $this->termService->all();

        return view('admin.exams.edit',compact('exam','subjects','streams','examCategories','years','terms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $exam = $this->examService->getId($id);
        if($exam){
            $this->examService->update($request,$id);
            $subjectId = $request->subject;
            $exam->subjects()->sync($subjectId);
            $streamId = $request->stream;
            $exam->streams()->sync($streamId);

            return redirect()->route('admin.exams.index')->withSuccess(ucwords($exam->name." ".'info updated successfully'));
        }
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
        $exam = $this->examService->getId($id);
        if($exam){
            $this->examService->delete($id);
            $exam->streams()->detach();
            $exam->subjects()->detach();
            $exam->students()->detach();
            $exam->departments()->detach();
            $exam->teachers()->detach();

            return redirect()->route('admin.exams.index')->withSuccess(ucwords($exam->name." ".'info deleted successfully'));
        }
    }
}
