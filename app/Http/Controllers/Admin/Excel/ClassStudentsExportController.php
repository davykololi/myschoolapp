<?php

namespace App\Http\Controllers\Admin\Excel;

use App\Models\MyClass;
use App\Services\ClassService;
use App\Exports\ClassStudentsNamesFormExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassStudentsExportController extends Controller
{
    protected $classService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClassService $classService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->classService = $classService;
    }

    public function classStudentsNames(Request $request)
    {
        $classId = $request->class_id;

        if((is_null($classId))){
            return back()->withErrors('Please select the class before you proceed!');
        }

        $class = MyClass::where('id',$classId)->first();
        $classStudents = $class->students;
        if($classStudents->isEmpty()){
            return back()->withErrors($class->name." "."has no students at the moment");
        }

        return Excel::download(new ClassStudentsNamesFormExport($class),$class->name." ".'Students.xlsx');
    }
}
