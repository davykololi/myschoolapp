<?php

namespace App\Http\Controllers\Superadmin\Teacher;

use App\Models\Teacher;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachSubjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
    }
    public function attachDetachSubject(Request $request,$id)
    {
    	$teacher = Teacher::findOrFail($id);
    	$subjects = $request->subjects;
    	$teacher->subjects()->sync($subjects);

    	return back()->withSuccess('Done Successfully');
    }
}
