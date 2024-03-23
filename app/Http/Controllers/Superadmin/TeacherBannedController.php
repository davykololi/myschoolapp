<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\TeacherService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherBannedController extends Controller
{
    protected $teacherService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TeacherService $teacherService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->teacherService = $teacherService;
    }

    public function bann(Request $request, $id)
    {
        $teacher = $this->teacherService->getId($id);
        $teacher->is_banned = true;
        $teacher->save();

        return back()->withSuccess('The teacher banned successfully');
    }

    public function unbann(Request $request, $id)
    {
        $teacher = $this->teacherService->getId($id);
        $teacher->is_banned = false;
        $teacher->save();

        return back()->withSuccess('The teacher ban lifted up successfully');
    }
}
