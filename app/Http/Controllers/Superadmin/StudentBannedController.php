<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentBannedController extends Controller
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

    public function bann(Request $request, $id)
    {
        $student = $this->studentService->getId($id);
        $student->is_banned = true;
        $student->save();

        return back()->withSuccess('The student banned successfully');
    }

    public function unbann(Request $request, $id)
    {
        $student = $this->studentService->getId($id);
        $student->is_banned = false;
        $student->save();

        return back()->withSuccess('The student ban lifted up successfully');
    }
}
