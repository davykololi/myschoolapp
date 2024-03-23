<?php

namespace App\Http\Controllers\Accountant;

use Auth;
use App\Models\Student;
use App\Models\Payment;
use App\Models\PaymentRecord;
use App\Models\MyClass;
use App\Models\Stream;
use App\Services\StudentService;
use App\Services\PaymentSectionService;
use App\Services\PaymentService;
use App\Services\YearService;
use App\Services\TermService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Payment\CreateFormRequest;
use App\Http\Requests\Payment\UpdateFormRequest;

class StudentController extends Controller
{
    protected $studentService, $yearService, $termService, $paymentSectionService, $paymentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService,YearService $yearService,TermService $termService,PaymentSectionService $paymentSectionService,PaymentService $paymentService)
    {
        $this->middleware('auth');
        $this->middleware('role:accountant');
        $this->middleware('accountant-banned');
        $this->middleware('checktwofa');
        $this->studentService = $studentService;
        $this->yearService = $yearService;
        $this->termService = $termService;
        $this->paymentSectionService = $paymentSectionService;
        $this->paymentService = $paymentService;
    }

    public function student(Request $request)
    {
        $user = Auth::user();
        if($user->hasRole('accountant')){
            $studendId = $request->student;
            if(is_null($studendId)){
                toastr()->error(ucwords('Please select the student name first!'));
                return back();
            }

            $student = Student::where('id',$studendId)->first();
            $studentPayments = $student->payments()->with('payment_records','student','school','year','terms')->latest('id')->get();
            $years = $this->yearService->all();
            $terms = $this->termService->all();
            $paymentSections = $this->paymentSectionService->all();

            return view('accountant.student.profile',compact('student','years','terms','studentPayments','paymentSections'));
        }
    }

    public function makePayment($id)
    {
        $user = Auth::user();
        if($user->hasRole('accountant')){
            $payment = $this->paymentService->getId($id);
            return view('accountant.payments.make_payment',compact('payment'));
        }
    }
}
