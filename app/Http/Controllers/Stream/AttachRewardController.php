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
        $this->middleware('banned');
    }
    public function attachReward(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$rewards = $request->rewards;
    	$stream->rewards()->attach($rewards);

    	return back()->withSuccess('The awards attached to the'." ".$stream->name." ".'successfully');
    }
}
