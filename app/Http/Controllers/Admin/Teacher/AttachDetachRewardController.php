<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Models\Teacher;
use App\Models\Reward;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachRewardController extends Controller
{
    //
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
    	$teacher = Teacher::findOrFail($id);
    	$rewards = $request->rewards;
    	$teacher->rewards()->sync($rewards);

    	return back()->withSuccess('Done Successfully');
    }
}
