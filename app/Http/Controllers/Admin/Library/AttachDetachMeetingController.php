<?php

namespace App\Http\Controllers\Admin\Library;

use App\Repositories\LibraryRepository as LibRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachMeetingController extends Controller
{
    protected $libRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LibRepo $libRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->libRepo = $libRepo;
    }

    public function attachDetachMeeting(Request $request,$id)
    {
    	$library = $this->libRepo->getId($id);
    	$meetings = $request->meetings;
    	$library->meetings()->sync($meetings);

    	return back()->withSuccess('Done Successfully');
    }
}
