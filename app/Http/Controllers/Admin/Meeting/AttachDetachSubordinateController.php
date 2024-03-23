<?php

namespace App\Http\Controllers\Admin\Meeting;

use App\Repositories\MeetingRepository as MeetingRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachSubordinateController extends Controller
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

    public function attachDetachSubordinate(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$subordinates = $request->subordinates;
    	$meeting->subordinates()->sync($subordinates);

    	return back()->withSuccess('Done Successfully');
    }
}
