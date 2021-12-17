<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Support\Facades\Notification;
use App\Models\PositionStudent;
use App\Services\ParentService;
use App\Services\StudentService;
use App\Models\School;
use App\Services\StreamService;
use App\Models\Dormitory;
use App\Models\Intake;
use App\Services\SubjectService;
use App\Models\Reward;
use App\Models\Assignment;
use App\Models\Meeting;
use App\Models\BloodGroup;
use App\Events\StudentRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\StudentFormRequest as StoreRequest;
use App\Http\Requests\StudentFormRequest as UpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SmsParentOnAdmissionNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValdatesRequests;

class StudentController extends Controller
{
    protected $studentService;
    protected $streamService;
    protected $parentService;
    protected $subjectService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService,StreamService $streamService,ParentService $parentService,SubjectService $subjectService)
    {
        $this->middleware('auth:admin');
        $this->studentService = $studentService;
        $this->streamService = $streamService;
        $this->parentService = $parentService;
        $this->subjectService = $subjectService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = $this->studentService->all();

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
        $studentRoles = PositionStudent::all();
        $bloodGroups = BloodGroup::all();

        return view('admin.students.create',compact('streams','intakes','dormitories','parents','studentRoles','bloodGroups'));
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
        $subjects = $this->subjectService->all();
        $studentSubjects = $student->subjects;
        $rewards = Reward::all();
        $studentRewards = $student->rewards;
        $assignments = Assignment::all();
        $studentAssignments = $student->assignments;
        $meetings = Meeting::all();
        $studentMeetings = $student->meetings;

        return view('admin.students.show',compact('student','subjects','studentSubjects','rewards','studentRewards','assignments','studentAssignments','meetings','studentMeetings'));
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
        $studentRoles = PositionStudent::all();
        $bloodGroups = BloodGroup::all();

        return view('admin.students.edit',compact('student','streams','intakes','dormitories','parents','studentRoles','bloodGroups'));
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
