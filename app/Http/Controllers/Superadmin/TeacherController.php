<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\Stream;
use Illuminate\Support\Facades\Storage;
use App\Services\TeacherService;
use App\Models\School;
use App\Models\Subject;
use App\Models\Assignment;
use App\Models\Reward;
use App\Models\Meeting;
use App\Models\TeacherRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherFormRequest as StoreRequest;
use App\Http\Requests\TeacherFormRequest as UpdateRequest;

class TeacherController extends Controller
{
    protected $teacherService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TeacherService $teacherService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('banned');
        $this->middleware('superadmin2fa');
        $this->teacherService = $teacherService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = $this->teacherService->all();

        return view('superadmin.teachers.index',['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $teacher = $this->teacherService->create($request);
        if(!$teacher){
            return redirect()->route('superadmin.teachers.index')->withErrors(ucwords('Oops!!, An error occured. Please try again later!'));
        }
            return redirect()->route('superadmin.teachers.index')->withSuccess(ucwords($teacher->name." ".'info created successfully'));
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
        $teacher = $this->teacherService->getId($id);
        $streams = Stream::all()->pluck('name','id');
        $teacherStreams = $teacher->streams;
        $subjects = Subject::all()->pluck('name','id');
        $teacherSubjects = $teacher->subjects;
        $assignments = Assignment::all()->pluck('name','id');
        $teacherAssignments = $teacher->assignments;
        $rewards = Reward::all()->pluck('name','id');
        $teacherRewards = $teacher->rewards;

        return view('superadmin.teachers.show',compact('teacher','streams','teacherStreams','subjects','teacherSubjects','assignments','teacherAssignments','rewards','teacherRewards'));
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
        $teacher = $this->teacherService->getId($id);

        return view('superadmin.teachers.edit',compact('teacher'));
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
        $teacher = $this->teacherService->getId($id);
        if($teacher){
            Storage::delete('public/storage/'.$teacher->image);
            $this->teacherService->update($request,$id);

            return redirect()->route('superadmin.teachers.index')->withSuccess(ucwords($teacher->name." ".'info updated successfully'));
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
        $teacher = $this->teacherService->getId($id);
        if($teacher){
            Storage::delete('public/storage/'.$teacher->image);
            $this->teacherService->delete($id);

            return redirect()->route('superadmin.teachers.index')->withSuccess(ucwords($teacher->name." ".'info deleted successfully'));
        }
    }
}
