<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Services\SchoolService;
use App\Services\AssignmentService;
use App\Services\StudentService;
use App\Services\StreamService;
use App\Services\SubordinateService;
use App\Services\TeacherService;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AssignFormRequest as StoreRequest;
use App\Http\Requests\AssignFormRequest as UpdateRequest;

class AssignmentController extends Controller
{
    protected $assignmentService,$schoolService,$studentService,$streamService,$subordinateService,$teacherService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AssignmentService $assignmentService,SchoolService $schoolService,StudentService $studentService,StreamService $streamService,SubordinateService $subordinateService,TeacherService $teacherService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->assignmentService = $assignmentService;
        $this->schoolService = $schoolService;
        $this->studentService = $studentService;
        $this->streamService = $streamService;
        $this->subordinateService = $subordinateService;
        $this->teacherService = $teacherService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $assignments = $this->assignmentService->all();

            return view('admin.assignments.index',compact('assignments'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $streams = $this->streamService->all();
            $teachers = $this->teacherService->all();
            $students = $this->studentService->all();
            $subordinates = $this->subordinateService->all();

            return view('admin.assignments.create',compact('streams','teachers','students','subordinates'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = Auth::user();
        if($user->hasRole('admin')){
            $assignment = $this->assignmentService->create($request);
            $streams = $request->streams;
            $assignment->streams()->sync($streams);
            $teachers = $request->teachers;
            $assignment->teachers()->sync($teachers);
            $students = $request->students;
            $assignment->students()->sync($students);
            $subordinates = $request->subordinates;
            $assignment->subordinates()->sync($subordinates);

            return redirect()->route('admin.assignments.index')->withSuccess(ucwords($assignment->name." ".'info created successfully'));
        }
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
        $assignment = $this->assignmentService->getId($id);
        $students = $this->studentService->all();
        $assignmentStudents = $assignment->students()->with('user')->get();
        $assignmentTeachers = $assignment->teachers()->with('user')->get();
        $assignmentSubordinates = $assignment->subordinates()->with('user')->get();


        return view('admin.assignments.show',compact('assignment','students','assignmentStudents','assignmentTeachers','assignmentSubordinates'));
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
        $assignment = $this->assignmentService->getId($id);
        $streams = $this->streamService->all();
        $teachers = $this->teacherService->all();
        $students = $this->studentService->all();
        $subordinates = $this->subordinateService->all();

        return view('admin.assignments.edit',compact('assignment','streams','teachers','students','subordinates'));
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
        $assignment = $this->assignmentService->getId($id);
        if($assignment){
            Storage::delete('public/files/'.$assignment->file);
            $this->assignmentService->update($request,$id);
            $teachers = $request->teachers;
            $assignment->teachers()->sync($teachers);
            $streams = $request->streams;
            $assignment->streams()->sync($streams);
            $students = $request->students;
            $assignment->students()->sync($students);
            $subordinates = $request->subordinates;
            $assignment->subordinates()->sync($subordinates);

            return redirect()->route('admin.assignments.index')->withSuccess(ucwords($assignment->name." ".'info updated successfully'));
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
        $assignment = $this->assignmentService->getId($id);
        if($assignment){
            Storage::delete('public/files/'.$assignment->file);
            $this->assignmentService->delete($id);
            $assignment->teachers()->detach();
            $assignment->streams()->detach();
            $assignment->students()->detach();
            $assignment->subordinates()->detach();

            return redirect()->route('admin.assignments.index')->withSuccess(ucwords($assignment->name." ".'info deleted successfully'));
        }
    }
}
