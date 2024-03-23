<?php

namespace App\Http\Controllers\Admin\Stream;

use App\Models\Stream;
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
    	$stream = Stream::findOrFail($id);
    	$rewards = $request->rewards;
    	$stream->rewards()->attach($rewards);

    	return back()->withSuccess('Done Successfully');
    }
}
