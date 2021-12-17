<?php

namespace App\Http\Controllers\Meeting;

use App\Repositories\MeetingRepository as MeetingRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachStudentController extends Controller
{
    protected $meetingRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MeetingRepo $meetingRepo)
    {
        $this->middleware('auth:admin');
        $this->meetingRepo = $meetingRepo;
    }

    public function attachStudent(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$student = $request->student;
    	$meeting->students()->attach($student);

    	return back()->withSuccess('The student attached to the meeting successfully');
    }
}
