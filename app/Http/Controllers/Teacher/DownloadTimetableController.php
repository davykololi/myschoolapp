<?php

namespace App\Http\Controllers\Teacher;

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
        $this->middleware('auth:teacher');
        $this->middleware('teacher2fa');
    }
    
    public function dowmloadTimetable($timetableId)
    {
    	$stdTimetable = Timetable::where('id',$timetableId)->firstOrFail();
    	$path = public_path().'/storage/files/'.$stdTimetable->file;

    	return response()->download($path);
    }
}
