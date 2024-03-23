<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentLockController extends Controller
{
    protected $studentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->studentService = $studentService;
    }

    public function lock(Request $request, $id)
    {
        $student = $this->studentService->getId($id);
        $student->lock = "disabled";
        $student->save();

        return back()->withSuccess('The student details locked successfully');
    }

    public function unlock(Request $request, $id)
    {
        $student = $this->studentService->getId($id);
        $student->lock = "enabled";
        $student->save();

        return back()->withSuccess('The student details unlocked successfully');
    }
}
