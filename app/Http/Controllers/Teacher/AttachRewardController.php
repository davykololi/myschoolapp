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
        $this->middleware('teacher2fa');
    }
    public function attachReward(Request $request,$id)
    {
    	$teacher = Teacher::findOrFail($id);
    	$rewards = $request->rewards;
    	$teacher->rewards()->sync($rewards);

    	return back()->withSuccess('The awards attached to the teacher successfully');
    }
}
