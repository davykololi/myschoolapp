<?php

namespace App\Http\Controllers\Accountant;

use App\Models\Student;
use App\Models\Payment;
use App\Models\PaymentRecord;
use App\Models\MyClass;
use App\Models\Stream;
use App\Services\StudentService;
use App\Services\YearService;
use App\Services\TermService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService, $yearService, $termService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService,YearService $yearService,TermService $termService)
    {
        $this->middleware('auth:accountant');
        $this->middleware('accountant2fa');
        $this->studentService = $studentService;
        $this->yearService = $yearService;
        $this->termService = $termService;
    }

    public function student(Request $request)
    {
        $studendId = $request->student;
        if(is_null($studendId)){
            return back()->withErrors('Please select the student name first!');
        }

        $student = Student::where('id',$studendId)->first();
        $studentPayments = $student->payments()->with('payment_records','student','school','year','term')->latest('id')->get();
        $years = $this->yearService->all();
        $terms = $this->termService->all();

        return view('accountant.student.profile',compact('student','years','terms','studentPayments'));
    }
}
