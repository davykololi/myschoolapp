<?php

namespace App\Http\Controllers\Admin\Subordinate;

use App\Services\SubordinateService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachAssignmentFromSubStaffController extends Controller
{
    protected $subordinateService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SubordinateService $subordinateService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->subordinateService = $subordinateService;
    }

    public function detachAssignmentFromSubStaff(Request $request,$id)
    {
        $subordinate = $this->subordinateService->getId($id);
        $assignments = $request->assignments;
        if(empty($assignments)){
            return back()->withErrors('Please select atleast an assignment or assignments before you proceed!');
        }
        $subordinate->assignments()->detach($assignments);

        return back()->withSuccess('Successfully Done');
    }
}
