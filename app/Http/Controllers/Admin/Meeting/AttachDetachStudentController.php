<?php

namespace App\Http\Controllers\Admin\Meeting;

use App\Repositories\MeetingRepository as MeetingRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachStudentController extends Controller
{
    protected $meetingRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MeetingRepo $meetingRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->meetingRepo = $meetingRepo;
    }

    public function attachDetachStudent(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$students = $request->students;
    	$meeting->students()->sync($students);

    	return back()->withSuccess('Done Successfully');
    }
}
