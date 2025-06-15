<?php

namespace App\Http\Controllers\Admin\Stream;

use App\Models\Stream;
use App\Models\Reward;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachAwardToStreamController extends Controller
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
    public function attachAwardToStream(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$awards = $request->awards;
        if(is_null($awards)){
            return back()->withError('Please select an award or awards before you proceed!');
        }
    	$stream->awards()->syncWithoutDetaching($awards);

    	return back()->withSuccess('Done Successfully');
    }
}
