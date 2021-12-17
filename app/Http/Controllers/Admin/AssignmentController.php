<?php

namespace App\Http\Controllers\Admin;

use App\Services\SchoolService;
use App\Services\AssignmentService;
use App\Services\StudentService;
use App\Services\StreamService;
use App\Services\StaffService;
use App\Services\TeacherService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AssignFormRequest as StoreRequest;
use App\Http\Requests\AssignFormRequest as UpdateRequest;

class AssignmentController extends Controller
{
    protected $assignmentService,$schoolService,$studentService,$streamService,$staffService,$teacherService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AssignmentService $assignmentService,SchoolService $schoolService,StudentService $studentService,StreamService $streamService,StaffService $staffService,TeacherService $teacherService)
    {
        $this->middleware('auth:admin');
        $this->assignmentService = $assignmentService;
        $this->schoolService = $schoolService;
        $this->studentService = $studentService;
        $this->streamService = $streamService;
        $this->staffService = $staffService;
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
        $assignments = $this->assignmentService->all();

        return view('admin.assignments.index',compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $streams = $this->streamService->all();
        $teachers = $this->teacherService->all();
        $students = $this->studentService->all();
        $staffs = $this->staffService->all();

        return view('admin.assignments.create',compact('streams','teachers','students','staffs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $assignment = $this->assignmentService->create($request);
        $teacherId = $request->teacher;
        $assignment->teachers()->attach($teacherId);
        $streamId = $request->stream;
        $assignment->streams()->attach($streamId);
        $studentId = $request->student;
        $assignment->students()->attach($studentId);
        $staffId = $request->staff;
        $assignment->staffs()->attach($staffId);


        return redirect()->route('admin.assignments.index')->withSuccess(ucwords($assignment->name." ".'info created successfully'));
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
        $assignmentStudents = $assignment->students;

        return view('admin.assignments.show',['assignment'=>$assignment,'students'=>$students,'assignmentStudents'=>$assignmentStudents]);
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
        $staffs = $this->staffService->all();

        return view('admin.assignments.edit',compact('assignment','streams','teachers','students','staffs'));
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
            $teacherId = $request->teacher;
            $assignment->teachers()->sync($teacherId);
            $streamId = $request->stream;
            $assignment->standards()->sync($standardId);
            $studentId = $request->student;
            $assignment->students()->sync($studentId);
            $staffId = $request->staff;
            $assignment->staffs()->sync($staffId);

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
            $assignment->staffs()->detach();

            return redirect()->route('admin.assignments.index')->withSuccess(ucwords($assignment->name." ".'info deleted successfully'));
        }
    }
}
