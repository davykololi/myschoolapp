<?php

namespace App\Http\Controllers\Meeting;

use App\Repositories\MeetingRepository as MeetingRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachStudentController extends Controller
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

    public function detachStudent(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$student = $request->student;
    	$meeting->students()->detach($student);

    	return back()->withSuccess('The student detached from the meeting successfully');
    }
}
