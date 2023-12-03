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
        $this->middleware('banned');
        $this->dormRepo = $dormRepo;
    }

    public function attachMeeting(Request $request,$id)
    {
    	$dormitory = $this->dormRepo->getId($id);
    	$meetings = $request->meetings;
    	$dormitory->meetings()->sync($meetings);

    	return back()->withSuccess('The meetings attached to the'." ".$dormitory->name." ".'successfully');
    }
}
