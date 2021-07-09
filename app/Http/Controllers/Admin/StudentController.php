<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Support\Facades\Notification;
use App\Models\PositionStudent;
use App\Models\Student;
use App\Models\MyParent;
use App\Models\School;
use App\Models\Stream;
use App\Models\Dormitory;
use App\Models\Intake;
use App\Models\Subject;
use App\Models\Reward;
use App\Models\Assignment;
use App\Models\Meeting;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\StudentFormRequest as StoreRequest;
use App\Http\Requests\StudentFormRequest as UpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;
use App\Notifications\SmsParentOnAdmissionNotification;

class StudentController extends Controller
{
    use ImageUploadTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function sendSms()
    {
        try{
            $basic = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"),getenv("NEXMO_SECRET"));
            $client = new \Nexmo\Client($basic);

            $student = Student::first();
            $receiverNumber = $student->parent->phone_no;
            $school = auth()->user()->school->name;
            $message = $student->full_name." ".'successfully admitted to'.$school->name;

            $message = $client->message()->send([
                        'to' => $receiverNumber,
                        'from' =>$school,
                        'text' => $message,
                    ]);
        } catch(Exception $e){
            dd("Error".$e->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::with('school','libraries','teachers','stream',)->get();

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
        $streams = Stream::all();
        $intakes = Intake::all();
        $dormitories = Dormitory::all();
        $parents = MyParent::all();
        $studentRoles = PositionStudent::all();

        return view('admin.students.create',compact('streams','intakes','dormitories','parents','studentRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'password'=>['required','string','confirmed',Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
            'password_confirmation' => ['required'],
        ]);
        //
        $input = $request->all();
        $input['school_id'] = auth()->user()->school->id;
        $input['stream_id'] = $request->stream;
        $input['intake_id'] = $request->intake;
        $input['dormitory_id'] = $request->dormitory;
        $input['admin_id'] = Auth::id();
        $input['parent_id'] = $request->parent;
        $input['position_student_id'] = $request->student_role;
        $input['password'] = Hash::make($request->password);
        $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $student = Student::create($input);

        try{
            $basic = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"),getenv("NEXMO_SECRET"));
            $client = new \Nexmo\Client($basic);

            $receiverNumber = $student->parent->phone_no;
            $school = auth()->user()->school->name;
            $message = $student->full_name." ".'successfully admitted to'.$school->name;

            $message = $client->message()->send([
                        'to' => $receiverNumber,
                        'from' =>$student->school->name,
                        'text' => $message,
                    ]);
        } catch(Exception $e){
            dd("Error".$e->getMessage());
        }

        return redirect()->route('admin.students.index')->withSuccess(ucwords($student->full_name." ".'info created successfully'));
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
        $student = Student::findOrFail($id);
        $subjects = Subject::all();
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
        $student = Student::findOrFail($id);
        $streams = Stream::all();
        $intakes = Intake::all();
        $dormitories = Dormitory::all();
        $parents = MyParent::all();
        $studentRoles = PositionStudent::all();

        return view('admin.students.edit',compact('student','streams','intakes','dormitories','parents','studentRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $student = Student::findOrFail($id);
        if($student){
            Storage::delete('public/storage/'.$student->image);
            $input=$request->only('first_name','middle_name','last_name','admission_no','dob','doa','email','postal_address','title','phone_no');
            $input['school_id'] = auth()->user()->school->id;
            $input['stream_id'] = $request->stream;
            $input['intake_id'] = $request->intake;
            $input['dormitory_id'] = $request->dormitory;
            $input['admin_id'] = Auth::id();
            $input['parent_id'] = $request->parent;
            $input['position_student_id'] = $request->student_role;
            $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
            $student->update($input);

            return redirect()->route('admin.students.index')->withSuccess(ucwords($student->full_name." ".'info updated successfully'));
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
            $student->delete();

            return redirect()->route('admin.students.index')->withSuccess(ucwords($student->full_name." ".'info deleted successfully'));
        }
    }
}
