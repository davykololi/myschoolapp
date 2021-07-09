<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Reward;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachRewardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function detachReward(Request $request,$id)
    {
    	$student = Student::findOrFail($id);
    	$reward = $request->reward;
    	$student->rewards()->detach($reward);

    	return back()->withSuccess('The reward detached from the student successfully');
    }
}
