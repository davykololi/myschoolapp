<?php

namespace App\Http\Controllers\Admin;

use App\Services\StreamService;
use App\Services\DepartmentService as DeptService;
use App\Services\RewardService;
use App\Services\TeacherService;
use App\Services\StudentService;
use App\Services\SubordinateService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RewardFormRequest as StoreRequest;
use App\Http\Requests\RewardFormRequest as UpdateRequest;

class RewardController extends Controller
{
    protected $streamService,$deptService,$rewardService,$teacherService,$studentService,$subordinateService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamService $streamService,DeptService $deptService,RewardService $rewardService,TeacherService $teacherService,StudentService $studentService,SubordinateService $subordinateService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->streamService = $streamService;
        $this->deptService = $deptService;
        $this->rewardService = $rewardService;
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
        $rewards = $this->rewardService->all();

        return view('admin.rewards.index',compact('rewards'));
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

        return view('admin.rewards.create',compact('teachers','students','subordinates','streams'));
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
        $reward = $this->rewardService->create($request);
        $teachers = $request->teachers;
        $reward->teachers()->sync($teachers);
        $students = $request->students;
        $reward->students()->sync($students);
        $subordinates = $request->subordinates;
        $reward->subordinates()->sync($subordinates);
        $streams = $request->streams;
        $reward->streams()->attach($streams);

        return redirect()->route('admin.rewards.index')->withSuccess(($reward->name." ".'info created successfully'));
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
        $reward = $this->rewardService->getId($id);

        return view('admin.rewards.show',['reward'=>$reward]);
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
        $reward = $this->rewardService->getId($id);
        $teachers = $this->teacherService->all();
        $students = $this->studentService->all();
        $subordinates = $this->subordinateService->all();
        $streams = $this->streamService->all();

        return view('admin.rewards.edit',compact('reward','teachers','students','subordinates','streams'));
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
        $reward = $this->rewardService->getId($id);
        if($reward){
        	$this->rewardService->update($request,$id);
        	$teachers = $request->teachers;
        	$reward->teachers()->sync($teachers);
        	$students = $request->students;
        	$reward->students()->sync($students);
        	$subordinates = $request->subordinates;
        	$reward->subordinates()->sync($subordinates);
        	$streams = $request->streams;
        	$reward->streams()->sync($streams);

        	return redirect()->route('admin.rewards.index')->withSuccess(($reward->name." ".'info updated successfully'));
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
        $reward = $this->rewardService->getId($id);
        if($reward){
        	$this->rewardService->delete($id);

        	$reward->teachers()->detach();
        	$reward->students()->detach();
        	$reward->subordinates()->detach();
        	$reward->streams()->detach();
        	$reward->clubs()->detach();

        	return redirect()->route('admin.rewards.index')->withSuccess(($reward->name." ".'info deleted successfully'));
        }
    }
}
