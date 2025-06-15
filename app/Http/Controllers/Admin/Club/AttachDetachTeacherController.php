<?php

namespace App\Http\Controllers\Admin\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachTeacherController extends Controller
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
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->clubRepo = $clubRepo;
    }
    public function attachDetachTeacher(Request $request,$id)
    {
    	$club = $this->clubRepo->getId($id);
    	$teachers = $request->teachers;
    	$club->teachers()->sync($teachers);

    	return back()->withSuccess('Done Successfully.');
    }
}
