<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Support\Facades\Notification;
use App\Services\StudentService;
use App\Models\School;
use App\Services\StreamService;
use App\Services\ParentService;
use App\Models\Dormitory;
use App\Models\Intake;
use App\Services\SubjectService;
use App\Models\Reward;
use App\Models\Assignment;
use App\Models\Meeting;
use App\Models\Student;
use App\Models\StudentInfo;
use App\Events\StudentRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StudentFormRequest as StoreRequest;
use App\Http\Requests\StudentFormRequest as UpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SmsParentOnAdmissionNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValdatesRequests;

class StudentController extends Controller
{
    protected $studentService, $streamService, $subjectService, $parentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService,StreamService $streamService,SubjectService $subjectService,Request $request, ParentService $parentService)
    {
        $this->middleware('auth:admin');
        $this->middleware('admin2fa');
        $this->studentService = $studentService;
        $this->streamService = $streamService;
        $this->subjectService = $subjectService;
        $this->parentService = $parentService;
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = $this->studentService->paginate();
        
        return view('admin.students.index',compact('students'));
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
        $intakes = Intake::all();
        $dormitories = Dormitory::all();
        $parents = $this->parentService->all();

        return view('admin.students.create',compact('streams','intakes','dormitories','parents'));
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
        $student = $this->studentService->create($request);
        $student_id = $student->id;
        $StudentInfo = $this->studentService->updateStudentInfo($request, $student_id);
        event(new StudentRegistered($student));

        return redirect()->route('admin.students.index')->withSuccess(ucwords($student->name." ".'info created successfully'));
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
        $student = $this->studentService->getId($id);
        $subjects = $this->subjectService->all()->pluck('name','id');
        $studentSubjects = $student->subjects;
        $rewards = Reward::all()->pluck('name','id');
        $studentRewards = $student->rewards;
        $assignments = Assignment::all()->pluck('name','id');
        $studentAssignments = $student->assignments;
        $meetings = Meeting::all()->pluck('name','id');
        $studentMeetings = $student->meetings;
        $vv = collect($student->stream->subjects()->pluck('name'));
        $streamSubjects = $vv->toArray();

        return view('admin.students.show',compact('student','subjects','studentSubjects','rewards','studentRewards','assignments','studentAssignments','meetings','studentMeetings','streamSubjects'));
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
        $student = $this->studentService->getId($id);
        $streams = $this->streamService->all();
        $intakes = Intake::all();
        $dormitories = Dormitory::all();
        $parents = $this->parentService->all();

        return view('admin.students.edit',compact('student','streams','intakes','dormitories','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
        //
        $student = $this->studentService->getId($id);
        if($student){
            Storage::delete('public/storage/'.$student->image);
            $this->studentService->update($request,$id); 
            $student_id = $student->id;
            $StudentInfo = $this->studentService->updateStudentInfo($request, $student_id); 

            return redirect()->route('admin.students.index')->withSuccess(ucwords($student->name." ".'info updated successfully'));
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
        $student = $this->studentService->getId($id);
        if($student){
            Storage::delete('public/storage/'.$student->image);
            $this->studentService->delete($id);

            return redirect()->route('admin.students.index')->withSuccess(ucwords($student->name." ".'info deleted successfully'));
        }
    }
}
