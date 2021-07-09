<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
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
    	$stream = Stream::findOrFail($id);
    	$reward = $request->reward;
    	$stream->rewards()->detach($reward);

    	return back()->withSuccess('The reward detached from the .$standard->name successfully');
    }
}
