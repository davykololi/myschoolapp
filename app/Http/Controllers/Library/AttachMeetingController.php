<?php

namespace App\Http\Controllers\Library;

use App\Repositories\LibraryRepository as LibRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachMeetingController extends Controller
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

    public function attachMeeting(Request $request,$id)
    {
    	$library = $this->libRepo->getId($id);
    	$meeting = $request->meeting;
    	$library->meetings()->attach($meeting);

    	return back()->withSuccess('The meeting attached to the library successfully');
    }
}
