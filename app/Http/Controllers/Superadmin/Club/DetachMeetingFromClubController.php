<?php

namespace App\Http\Controllers\Superadmin\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachMeetingFromClubController extends Controller
{
    protected $clubRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClubRepo $clubRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->clubRepo = $clubRepo;
    }

    public function detachMeetingFromClub(Request $request,$id)
    {
        $club = $this->clubRepo->getId($id);
        $meetings = $request->meetings;
        if(is_null($meetings)){
            return back()->withErrors('Please ensure you select a meeting or meetings before you proceed!');
        }
        $club->meetings()->detach($meetings);

        return back()->withSuccess('Done Successfully');
    }
}
