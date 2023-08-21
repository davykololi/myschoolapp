<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Reward;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachRewardController extends Controller
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
    public function attachReward(Request $request,$id)
    {
    	$student = Student::findOrFail($id);
    	$rewards = $request->rewards;
    	$student->rewards()->sync($rewards);

    	return back()->withSuccess('The rewards attached to the student successfully');
    }
}
