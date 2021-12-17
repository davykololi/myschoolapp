<?php

namespace App\Http\Controllers\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachStudentController extends Controller
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

    public function detachStudent(Request $request,$id)
    {
    	$club = $this->clubRepo->getId($id);
    	$student = $request->student;
    	$club->students()->detach($student);

    	return back()->withSuccess('The student detached from the club successfully');
    }
}
