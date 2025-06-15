<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Services\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function students(Request $request)
    {
        //
        $user = Auth::user();
        $search = strtolower($request->search);
        if($user->hasRole('superadmin')){
            if($search){
                $students = Student::whereLike(['user.first_name','user.middle_name','user.last_name','user.email','admission_no','doa','position','dob','adm_mark','phone_no','stream.name','dormitory.name'], $search)->eagerLoaded()->paginate(15);
    
                return view('superadmin.students.students',compact('students'));
            } else {
                $students = $this->studentService->paginated();

                return view('superadmin.students.students',compact('students'));
            } 
        }
    }
}
