<?php

namespace App\Http\Controllers\Superadmin\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachStudentFromClubController extends Controller
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

    public function detachStudentFromClub(Request $request,$id)
    {
        $club = $this->clubRepo->getId($id);
        $students = $request->students;
        if(is_null($students)){
            return back()->withErrors('Please ensure you select a student or students before you proceed!');
        }
        $club->students()->detach($students);

        return back()->withSuccess('Done Successfully');
    }
}
