<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Subordinate;
use App\Services\SubordinateService;
use App\Services\AssignmentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubordinateController extends Controller
{
    protected $subordinateService, $assignmentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SubordinateService $subordinateService, AssignmentService $assignmentService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->subordinateService = $subordinateService;
        $this->assignmentService = $assignmentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subordinates( Request $request)
    {
        //
        $user = Auth::user();
        if($user->hasRole('admin')){
            $search = strtolower($request->search);
            if($search){
                $subordinates = Subordinate::whereLike(['user.first_name', 'user.middle_name', 'user.last_name', 'user.email', 'phone_no','emp_no','position', 'id_no', 'designation','departments.name','clubs.name','assignments.name','school.name'], $search)->eagerLoaded()->paginate(15);

                return view('admin.subordinates.index',compact('subordinates'));
            } else {
                $subordinates = $this->subordinateService->all();

                return view('admin.subordinates.index',compact('subordinates'));
            } 
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewSubStaff($id)
    {
        //
        $subordinate = $this->subordinateService->getId($id);
        $assignments = $this->assignmentService->all();

        return view('admin.subordinates.show',compact('subordinate','assignments'));
    }
}
