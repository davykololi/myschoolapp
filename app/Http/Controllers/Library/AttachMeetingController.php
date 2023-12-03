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
        $this->middleware('banned');
        $this->libRepo = $libRepo;
    }

    public function attachMeeting(Request $request,$id)
    {
    	$library = $this->libRepo->getId($id);
    	$meetings = $request->meetings;
    	$library->meetings()->sync($meetings);

    	return back()->withSuccess('The meetings attached to the'." ".$library->name." ".'successfully');
    }
}
