<?php

namespace App\Http\Controllers\Admin;

use App\Services\StreamService;
use App\Services\DepartmentService as DeptService;
use App\Services\AwardService;
use App\Services\TeacherService;
use App\Services\StudentService;
use App\Services\SubordinateService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AwardFormRequest as StoreRequest;
use App\Http\Requests\AwardFormRequest as UpdateRequest;

class AwardController extends Controller
{
    protected $streamService,$deptService,$awardService,$teacherService,$studentService,$subordinateService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamService $streamService,DeptService $deptService,AwardService $awardService,TeacherService $teacherService,StudentService $studentService,SubordinateService $subordinateService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->streamService = $streamService;
        $this->deptService = $deptService;
        $this->awardService = $awardService;
        $this->teacherService = $teacherService;
        $this->studentService = $studentService;
        $this->subordinateService = $subordinateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $awards = $this->awardService->all();

        return view('admin.awards.index',compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teachers = $this->teacherService->all();
        $students = $this->studentService->all();
        $subordinates = $this->subordinateService->all();
        $streams = $this->streamService->all();

        return view('admin.awards.create',compact('teachers','students','subordinates','streams'));
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
        $award = $this->awardService->create($request);
        $teachers = $request->teachers;
        $award->teachers()->sync($teachers);
        $students = $request->students;
        $award->students()->sync($students);
        $subordinates = $request->subordinates;
        $award->subordinates()->sync($subordinates);
        $streams = $request->streams;
        $award->streams()->attach($streams);

        return redirect()->route('admin.awards.index')->withSuccess(($award->name." ".'info created successfully'));
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
        $award = $this->awardService->getId($id);

        return view('admin.awards.show',['award'=>$award]);
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
        $award = $this->awardService->getId($id);
        $teachers = $this->teacherService->all();
        $students = $this->studentService->all();
        $subordinates = $this->subordinateService->all();
        $streams = $this->streamService->all();

        return view('admin.awards.edit',compact('award','teachers','students','subordinates','streams'));
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
        $award = $this->awardService->getId($id);
        if($award){
        	$this->awardService->update($request,$id);
        	$teachers = $request->teachers;
        	$award->teachers()->sync($teachers);
        	$students = $request->students;
        	$award->students()->sync($students);
        	$subordinates = $request->subordinates;
        	$award->subordinates()->sync($subordinates);
        	$streams = $request->streams;
        	$award->streams()->sync($streams);

        	return redirect()->route('admin.awards.index')->withSuccess(($award->name." ".'info updated successfully'));
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
        $award = $this->awardService->getId($id);
        if($award){
        	$this->awardService->delete($id);

        	$award->teachers()->detach();
        	$award->students()->detach();
        	$award->subordinates()->detach();
        	$award->streams()->detach();
        	$award->clubs()->detach();

        	return redirect()->route('admin.awards.index')->withSuccess(($award->name." ".'info deleted successfully'));
        }
    }
}
