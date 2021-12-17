<?php

namespace App\Http\Controllers\Dormitory;

use App\Repositories\DormitoryRepository as DormRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachMeetingController extends Controller
{
    protected $dormRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DormRepo $dormRepo)
    {
        $this->middleware('auth:admin');
        $this->dormRepo = $dormRepo;
    }

    public function attachMeeting(Request $request,$id)
    {
    	$dormitory = $this->dormRepo->getId($id);
    	$meeting = $request->meeting;
    	$dormitory->meetings()->attach($meeting);

    	return back()->withSuccess('The meeting attached to the dormitory successfully');
    }
}
