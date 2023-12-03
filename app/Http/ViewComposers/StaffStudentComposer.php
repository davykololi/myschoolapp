<?php

namespace App\Http\ViewComposers;

use Auth;
use App\Models\School;
use App\Services\StudentService;
use Illuminate\View\View;

class StaffStudentComposer 
{
    protected $studentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */

    public function compose(View $view)
    {
        $user = Auth::user();
        $students = $this->studentService->all();

        $view->with(['user'=>$user,'students'=>$students]); 
    }
}
