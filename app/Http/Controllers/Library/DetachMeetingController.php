<?php

namespace App\Http\Controllers\Library;

use App\Repositories\LibraryRepository as LibRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachMeetingController extends Controller
{
    protected $libRepo;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LibRepo $libRepo)
    {
        $this->middleware('auth:admin');
        $this->libRepo = $libRepo;
    }

    public function detachMeeting(Request $request,$id)
    {
    	$library = $this->libRepo->getId($id);
    	$meeting = $request->meeting;
    	$library->meetings()->detach($meeting);

    	return back()->withSuccess('The meeting detached from the library successfully');
    }
}
