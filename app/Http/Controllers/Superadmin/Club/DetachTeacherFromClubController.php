<?php

namespace App\Http\Controllers\Superadmin\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachTeacherFromClubController extends Controller
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
    public function detachTeacherFromClub(Request $request,$id)
    {
        $club = $this->clubRepo->getId($id);
        $teachers = $request->teachers;
        if(is_null($teachers)){
            return back()->withErrors('Please ensure you select a teacher or teachers before you proceed!');
        }
        $club->teachers()->detach($teachers);

        return back()->withSuccess('Done Successfully.');
    }
}
