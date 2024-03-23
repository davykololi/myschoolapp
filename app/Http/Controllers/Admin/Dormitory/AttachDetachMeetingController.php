<?php

namespace App\Http\Controllers\Admin\Dormitory;

use App\Repositories\DormitoryRepository as DormRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachMeetingController extends Controller
{
    protected $dormRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DormRepo $dormRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->dormRepo = $dormRepo;
    }

    public function attachDetachMeeting(Request $request,$id)
    {
    	$dormitory = $this->dormRepo->getId($id);
    	$meetings = $request->meetings;
    	$dormitory->meetings()->sync($meetings);

    	return back()->withSuccess('Done Successfully');
    }
}
