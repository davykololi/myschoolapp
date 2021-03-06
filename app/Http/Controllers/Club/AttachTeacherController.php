<?php

namespace App\Http\Controllers\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachTeacherController extends Controller
{
    protected $clubRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClubRepo $clubRepo)
    {
        $this->middleware('auth:admin');
        $this->clubRepo = $clubRepo;
    }
    public function attachTeacher(Request $request,$id)
    {
    	$club = $this->clubRepo->getId($id);
    	$teacher = $request->teacher;
    	$club->teachers()->attach($teacher);

    	return back()->withSuccess('The teacher attached to the club successfully.');
    }
}
