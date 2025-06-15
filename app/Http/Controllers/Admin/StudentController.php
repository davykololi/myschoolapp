<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Support\Facades\Notification;
use App\Services\StudentService;
use App\Models\School;
use App\Models\User;
use App\Services\StreamService;
use App\Services\ParentService;
use App\Models\Dormitory;
use App\Models\Intake;
use App\Services\SubjectService;
use App\Models\Award;
use App\Models\Assignment;
use App\Models\Meeting;
use App\Models\Student;
use App\Models\StudentInfo;
use App\Events\StudentRegistered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Enums\StudentPositionEnum;
use App\Http\Requests\StudentFormRequest as StoreRequest;
use App\Http\Requests\StudentFormRequest as UpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SmsParentOnAdmissionNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValdatesRequests;

class StudentController extends Controller
{
    use ImageUploadTrait;
    protected $studentService, $streamService, $subjectService, $parentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService,StreamService $streamService,SubjectService $subjectService, ParentService $parentService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->studentService = $studentService;
        $this->streamService = $streamService;
        $this->subjectService = $subjectService;
        $this->parentService = $parentService;
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
            $search = strtolower($request->search);
            if($search){
                $students = Student::whereLike(['user.first_name','user.middle_name','user.last_name','user.email','admission_no','doa','position','dob','adm_mark','phone_no','stream.name','dormitory.name','intake.name','stream.name','assignments.name'], $search)->eagerLoaded()->paginate(15);

                return view('admin.students.index',compact('students'));
            } else {
                $students = $this->studentService->paginated();

                return view('admin.students.index',compact('students'));
            }
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
        $streams = $this->streamService->all();
        $intakes = Intake::all();
        $dormitories = Dormitory::all();
        $parents = $this->parentService->all();
        $positions = StudentPositionEnum::cases();

        return view('admin.students.create',compact('streams','intakes','dormitories','parents','positions'));
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
        $user = User::create([
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'school_id' => Auth::user()->school->id,
        ]);

        $user->student()->create([
            'image' => $this->verifyAndUpload($request,'image','public/storage/'),
            'gender' => $request->gender,
            'blood_group' => $request->blood_group,
            'adm_mark' => $request->adm_mark,
            'admission_no' => auth()->user()->school->initials."/".$request->admission_no."/".date('Y'),
            'phone_no' => $request->phone_no,
            'dob' => $request->dob,
            'doa' => $request->doa,
            'position' => $request->position,
            'stream_id' => $request->stream_id,
            'intake_id' => $request->intake_id,
            'dormitory_id' => $request->dormitory_id,
            'school_id' => auth()->user()->school->id,
            'admin_id' => Auth::user()->admin->id,
            'parent_id' => $request->parent_id, 
            'active' => 1,
        ]);

        $user->assignRole('student');
        $student_id = $user->student->id;
        $StudentInfo = $this->studentService->updateStudentInfo($request, $student_id);
        event(new StudentRegistered($user));

        return redirect()->route('admin.students.index')->withSuccess(ucwords($user->full_name." ".'info created successfully'));
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
        $awards = Award::all();
        $studentAwards = $student->awards;
        $assignments = Assignment::all();
        $studentAssignments = $student->assignments()->with('teachers')->get();
        $meetings = Meeting::all();
        $studentMeetings = $student->meetings;
        $studentClubs = $student->clubs;
        $vv = collect($student->stream->subjects()->pluck('name'));
        $streamSubjects = $vv->toArray();

        return view('admin.students.show',compact('student','subjects','studentSubjects','awards','studentAwards','assignments','studentAssignments','meetings','studentMeetings','studentClubs','streamSubjects'));
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
        $positions = StudentPositionEnum::cases();

        return view('admin.students.edit',compact('student','streams','intakes','dormitories','parents','positions'));
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
        $student = Student::findOrFail($id);
        if($student){
            Storage::delete('public/storage/'.$student->image);
            $student->user()->update([
                'salutation' => $request->salutation,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'school_id' => Auth::user()->school->id,
            ]);

            $student->update([
                'image' => $this->verifyAndUpload($request,'image','public/storage/'),
                'gender' => $request->gender,
                'blood_group' => $request->blood_group,
                'adm_mark' => $request->adm_mark,
                'admission_no' => $request->admission_no,
                'phone_no' => $request->phone_no,
                'dob' => $request->dob,
                'doa' => $request->doa,
                'position' => $request->position,
                'stream_id' => $request->stream_id,
                'intake_id' => $request->intake_id,
                'dormitory_id' => $request->dormitory_id,
                'school_id' => auth()->user()->school->id,
                'admin_id' => Auth::user()->admin->id,
                'parent_id' => $request->parent_id, 
                'active' => $request->active,
            ]);

            return redirect()->route('admin.students.index')->withSuccess(ucwords($student->user->full_name." ".'info updated successfully'));
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
        $student = Student::findOrFail($id);
        if($student){
            Storage::delete('public/storage/'.$student->image);
            $user = User::findOrFail($student->user_id);
            $user->student()->delete();
            $user->delete();
            $user->removeRole('student');

            return redirect()->route('admin.admins.index')->withSuccess(ucwords($user->full_name." ".'info deleted successfully'));
        }   
    }
}
