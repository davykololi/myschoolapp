<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Stream;
use Illuminate\Support\Facades\Storage;
use App\Services\TeacherService;
use App\Models\School;
use App\Models\Subject;
use App\Models\Assignment;
use App\Models\Reward;
use App\Models\Meeting;
use App\Models\StreamSubject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Enums\TeacherPositionEnum;
use App\Http\Requests\CommonUserFormRequest as StoreRequest;
use App\Http\Requests\CommonUserFormRequest as UpdateRequest;

class TeacherController extends Controller
{
    use ImageUploadTrait;
    protected $teacherService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TeacherService $teacherService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->teacherService = $teacherService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        //
        $user = Auth::user();
        if($user->hasRole('superadmin')){
            $search = strtolower($request->search);
            if($search){
                $teachers = Teacher::whereLike(['user.salutation','user.first_name', 'user.middle_name', 'user.last_name', 'user.email', 'phone_no','emp_no','position', 'id_no', 'designation','gender','streams.name'], $search)->eagerLoaded()->paginate(15);

                return view('superadmin.teachers.index',compact('teachers'));
            } else {
                $teachers = $this->teacherService->paginated();

                return view('superadmin.teachers.index',compact('teachers'));
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
        $positions = TeacherPositionEnum::cases();
        return view('superadmin.teachers.create',compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = User::create([
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'school_id' => Auth::user()->school->id,
        ]);

        $user->teacher()->create([
            'blood_group' => $request->blood_group,
            'image' => $this->verifyAndUpload($request,'image','public/storage/'),
            'gender' => $request->gender,
            'id_no' => $request->id_no,
            'emp_no' => $request->emp_no,
            'dob' => $request->dob,
            'designation' => $request->designation,
            'phone_no' => $request->phone_no,
            'history' => $request->history,
            'position' => $request->position,
            'school_id' => Auth::user()->school->id,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        $user->assignRole('teacher');

        return redirect()->route('superadmin.teachers.index')->withSuccess(ucwords($user->full_name." ".'info created successfully'));
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
        $streams = Stream::all();
        $teacherStreams = $teacher->streams;
        $subjects = Subject::all();
        $teacherSubjects = $teacher->subjects()->with('subject')->get();
        $assignments = Assignment::all();
        $teacherAssignments = $teacher->assignments;
        $rewards = Reward::all();
        $teacherRewards = $teacher->rewards;
        $streamSubjects = StreamSubject::all();
        $teacherStreamSubjects = $teacher->stream_subjects()->with('subject','teacher','stream')->get();

        return view('superadmin.teachers.show',compact('teacher','streams','teacherStreams','subjects','teacherSubjects','assignments','teacherAssignments','rewards','teacherRewards','streamSubjects','teacherStreamSubjects'));
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
        $positions = TeacherPositionEnum::cases();

        return view('superadmin.teachers.edit',compact('teacher','positions'));
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
            $teacher->user()->update([
                'salutation' => $request->salutation,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'gender' => $request->gender,
                'school_id' => Auth::user()->school->id,
            ]);

            $teacher->update([
                'blood_group' => $request->blood_group,
                'image' => $this->verifyAndUpload($request,'image','public/storage/'),
                'gender' => $request->gender,
                'id_no' => $request->id_no,
                'emp_no' => $request->emp_no,
                'dob' => $request->dob,
                'designation' => $request->designation,
                'phone_no' => $request->phone_no,
                'history' => $request->history,
                'position' => $request->position,
                'school_id' => Auth::user()->school->id,
                'current_address'   => $request->current_address,
                'permanent_address' => $request->permanent_address
            ]);

            return redirect()->route('superadmin.teachers.index')->withSuccess(ucwords($teacher->user->full_name." ".'info updated successfully'));
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
            $user = User::findOrFail($teacher->user_id);
            $user->teacher()->delete();
            $user->delete();
            $user->removeRole('teacher');

            return redirect()->route('superadmin.teachers.index')->withSuccess(ucwords($user->full_name." ".'info deleted successfully'));
        }
    }
}
