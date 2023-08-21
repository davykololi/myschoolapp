<?php

namespace App\Http\Controllers\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachStudentController extends Controller
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

    public function attachStudent(Request $request,$id)
    {
    	$club = $this->clubRepo->getId($id);
    	$students = $request->students;
    	$club->students()->attach($students);

    	return back()->withSuccess('The students attached to the club successfully');
    }
}
