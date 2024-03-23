<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Services\StreamService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentLockController extends Controller
{
    protected $streamService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamService $streamService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->streamService = $streamService;
    }

    public function lockPayment(Student $student)
    {
        $student->payment_locked = true;
        $student->save();

        return back()->withSuccess('Payment switch for'." ".$student->user->full_name." "."locked successfully");
    }

    public function unlockPayment(Student $student)
    {
        $student->payment_locked = false;
        $student->save();

        return back()->withSuccess('Payment switch for'." ".$student->user->full_name." "."unlocked successfully");
    }

    public function paymentStreams()
    {
        $streams = $this->streamService->all();

        return view('admin.payment.streams',compact('streams'));
    }

    public function paymentStreamShow($id)
    {
        $stream = $this->streamService->getId($id);
        $streamStudents = $stream->students()->with('stream.student','student.user')->get();

        return view('admin.payment.stream',compact('stream','streamStudents'));
    }
}
