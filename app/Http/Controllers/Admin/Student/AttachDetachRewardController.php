<?php

namespace App\Http\Controllers\Admin\Student;

use App\Models\Student;
use App\Models\Reward;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachRewardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
    }
    public function attachDetachReward(Request $request,$id)
    {
    	$student = Student::findOrFail($id);
    	$rewards = $request->rewards;
    	$student->rewards()->sync($rewards);

    	return back()->withSuccess('Done Successfully');
    }
}
