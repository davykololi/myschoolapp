<?php

namespace App\Http\Controllers\Superadmin\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachSubStaffFromClubController extends Controller
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

    public function detachSubStaffToClub(Request $request,$id)
    {
        $club = $this->clubRepo->getId($id);
        $subordinates = $request->subordinates;
        if(is_null($subordinates)){
            return back()->withErrors('Please ensure you select a subordinate staff or subordinate staffs before you proceed!');
        }
        $club->subordinates()->detach($subordinates);

        return back()->withSuccess('Done Successfully');
    }
}
