<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Student;
use App\Models\Stream;
use App\Models\MyClass;
use App\Models\School;
use App\Models\Payment;
use App\Models\PaymentSection;
use App\Services\PaymentService;
use App\Services\YearService;
use App\Services\TermService;
use App\Services\ClassService;
use App\Services\StreamService;
use App\Services\StudentService;
use App\Services\SchoolService;
use App\Services\PaymentSectionService;
use App\Models\PaymentRecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Payment\CreateFormRequest;
use App\Http\Requests\Payment\UpdateFormRequest;

class PaymentAllocationController extends Controller
{
    protected $paymentSectionService ,$paymentService, $studentService, $yearService, $termService, $classService, $streamService, $schoolService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PaymentSectionService $paymentSectionService,PaymentService $paymentService,StudentService $studentService,YearService $yearService,TermService $termService,ClassService $classService,StreamService $streamService, SchoolService $schoolService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->studentService = $studentService;
        $this->paymentService = $paymentService;
        $this->paymentSectionService = $paymentSectionService;
        $this->yearService = $yearService;
        $this->termService = $termService;
        $this->classService = $classService;
        $this->streamService = $streamService;
        $this->schoolService = $schoolService;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function paymentAllocationForm()
    {
        $user = Auth::user();
        if(Auth::check() && $user->hasRole('admin')){
            $students = $this->studentService->all();
            $years = $this->yearService->all();
            $terms = $this->termService->all();
            $classes = $this->classService->all();
            $streams = $this->streamService->all();
            $schools = $this->schoolService->all();
            $paymentSections = $this->paymentSectionService->all();

            return view('admin.payment_allocation.payment_allocation_form',compact('students','years','terms','classes','streams','schools','paymentSections'));  
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function allocatePaymentToClass(CreateFormRequest $request)
    {
        $classId = $request->class_id;
        $paymentSectionId = $request->payment_section;
        $paymentSection = PaymentSection::whereId($paymentSectionId)->first();

        $class = MyClass::whereId($classId)->first();
        $classStudents = $class->students()->with('payments')->get();
        if($classStudents->isEmpty()){
            return back()->withErrors($class->name." ".'has no students at the moment!');
        }

        $classStudentsIdsToArray = $classStudents->pluck('id')->toArray();
        $countClassStudentsIds = count($classStudentsIdsToArray);

        for($i=0; $i < $countClassStudentsIds; $i++){
            $payment = Payment::upsert([
                        'description' => $paymentSection->description,
                        'amount' => $paymentSection->payment_amount,
                        'ref_no' => $paymentSection->ref_no,
                        'student_id' => $classStudentsIdsToArray[$i],
                        'payment_section_id' => $paymentSection->id,
                        'special_id' => $paymentSection->ref_no."/".$classStudentsIdsToArray[$i],
                        'school_id' => Auth::user()->school->id,
                        'year_id' => $request->year_id,
            ],['special_id'],['description','amount','ref_no','student_id','payment_section_id','school_id','year_id']);
        }
        return back()->withSuccess("The payment successfully allocated to"." ".$class->name." "."Students");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function allocatePaymentToStream(CreateFormRequest $request)
    {
        $streamId = $request->stream_id;
        $paymentSectionId = $request->payment_section;
        $paymentSection = PaymentSection::whereId($paymentSectionId)->first();

        $stream = Stream::whereId($streamId)->first();
        $streamStudents = $stream->students()->with('payments')->get();
        if($streamStudents->isEmpty()){
            return back()->withErrors($stream->name." ".'has no students at the moment!');
        }

        $streamStudentsIdsToArray = $streamStudents->pluck('id')->toArray();
        $countStreamStudentsIds = count($streamStudentsIdsToArray);

        for($i=0; $i < $countStreamStudentsIds; $i++){
            $payment = Payment::upsert([
                        'description' => $paymentSection->description,
                        'amount' => $paymentSection->payment_amount,
                        'ref_no' => $paymentSection->ref_no,
                        'student_id' => $streamStudentsIdsToArray[$i],
                        'payment_section_id' => $paymentSection->id,
                        'special_id' => $paymentSection->ref_no."/".$classStudentsIdsToArray[$i],
                        'school_id' => Auth::user()->school->id,
                        'year_id' => $request->year_id,
                ],['special_id'],['description','amount','ref_no','student_id','payment_section_id','school_id','year_id']);
        }

        return back()->withSuccess("The payment successfully allocated to"." ".$stream->name." "."Students");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function allocatePaymentToSchool(CreateForRequest $request)
    {
        $paymentSectionId = $request->payment_section;
        $paymentSection = PaymentSection::whereId($paymentSectionId)->first();

        $school = School::whereId(Auth::user()->school->id)->first();
        $schoolStudents = $school->students()->with('payments')->get();
        if($schoolStudents->isEmpty()){
            return back()->withErrors($school->name." ".'has no students at the moment!');
        }

        $schoolStudentsIdsToArray = $schoolStudents->pluck('id')->toArray();
        $countSchoolStudentsIds = count($schoolStudentsIdsToArray);

        for($i=0; $i < $countSchoolStudentsIds; $i++){
            $payment = Payment::upsert([
                        'description' => $paymentSection->description,
                        'amount' => $paymentSection->payment_amount,
                        'ref_no' => $paymentSection->ref_no,
                        'student_id' => $schoolStudentsIdsToArray[$i],
                        'payment_section_id' => $paymentSection->id,
                        'special_id' => $paymentSection->ref_no."/".$classStudentsIdsToArray[$i],
                        'school_id' => $school->id,
                        'year_id' => $request->year_id,
                ],['special_id'],['description','amount','ref_no','student_id','payment_section_id','school_id','year_id']);
        }

        return back()->withSuccess("The payment successfully allocated to"." ".$school->name." "."Students");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function allocatePaymentToStudent(CreateFormRequest $request)
    {
        $studentId = $request->student_id;
        $paymentSectionId = $request->payment_section;
        $paymentSection = PaymentSection::whereId($paymentSectionId)->first();

        $student = Student::whereId($studentId)->first();
        if(is_null($student)){
            return back()->withErrors('Please select the student before you proceed!');
        }

        $payment = Payment::upsert([
                    'description' => $paymentSection->description,
                    'amount' => $paymentSection->payment_amount,
                    'ref_no' => $paymentSection->ref_no,
                    'student_id' => $student->id,
                    'payment_section_id' => $paymentSection->id,
                    'special_id' => $paymentSection->ref_no."/".$classStudentsIdsToArray[$i],
                    'school_id' => Auth::user()->school->id,
                    'year_id' => $request->year_id,
            ],['special_id'],['description','amount','ref_no','student_id','payment_section_id','school_id','year_id']);

        return back()->withSuccess("The payment successfully allocated to"." ".$student->user->full_name);
    }
}
