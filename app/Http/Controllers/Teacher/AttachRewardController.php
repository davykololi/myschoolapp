<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use App\Models\Reward;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachRewardController extends Controller
{
    //
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
    	$teacher = Teacher::findOrFail($id);
    	$reward = $request->reward;
    	$teacher->rewards()->attach($reward);

    	return back()->withSuccess('The reward attached to the teacher successfully');
    }
}
