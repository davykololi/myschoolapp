<?php

namespace App\Http\Controllers\Admin;

use App\Models\Timetable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadTimetableController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('banned');
        $this->middleware('admin2fa');
    }
    
    public function dowmloadTimetable($timetableId)
    {
    	$stdTimetable = Timetable::where('id',$timetableId)->firstOrFail();
    	$path = public_path().'/storage/files/'.$stdTimetable->file;

    	return response()->download($path);
    }
}
