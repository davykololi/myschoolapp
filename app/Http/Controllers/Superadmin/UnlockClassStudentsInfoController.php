<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\MyClass;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnlockClassStudentsInfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
    }

    public function unlockClassStudentsInfo(Request $request)
    {
        $classId = $request->class_id;
        $class = MyClass::whereId($classId)->first();
        $classSudents = $class->students;
        $classStudentsIdsToArray = $classSudents->pluck('id')->toArray();

        Student::whereIn('id',$classStudentsIdsToArray)->update(['lock'=> 'enabled']);

        return back()->withSuccess($class->name." "."Students information locked successfully");
    }
}
