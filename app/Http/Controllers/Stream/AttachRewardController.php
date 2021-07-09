<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
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
    	$stream = Stream::findOrFail($id);
    	$reward = $request->reward;
    	$stream->rewards()->attach($reward);

    	return back()->withSuccess('The reward attached to the {{$stream->class->name}} {{$stream->name}} successfully');
    }
}
