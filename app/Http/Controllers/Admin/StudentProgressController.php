<?php

namespace App\Http\Controllers\Admin;

use App\Models\Record;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentProgressController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin2fa');
    }
    
    public function studentRecord(Request $request)
    {
    	$input = $request->all();
    	$input['student_id'] = $request->student_id;
    	Record::create($input);

    	return redirect()->back();
    }
}
