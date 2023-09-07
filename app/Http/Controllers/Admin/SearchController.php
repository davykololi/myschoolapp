<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Staff;
use App\Models\Club;
use App\Models\Department;
use App\Models\Dormitory;
use App\Models\Subject;
use App\Models\Kitchen;
use App\Models\Hall;
use App\Models\Stream;
use App\Models\Exam;
use App\Models\Farm;
use App\Models\Field;
use App\Models\Game;
use App\Models\Intake;
use App\Models\Library;
use App\Models\Meeting;
use App\Models\Note;
use App\Models\ReportCard;
use App\Models\Reward;
use App\Models\StreamSubjectTeacher;
use App\Models\Timetable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('banned');
        $this->middleware('admin2fa');
    }
    
    public function search(Request $request)
    {
    	$searchterm = $request->input('query');
        if(is_null($searchterm)){
            return back()->withErrors('Please provide search term first!');
        }

        $searchResults = (new Search())
                        ->registerModel(Student::class,['first_name','middle_name','last_name','phone_no','admission_no','dob','email'])
                        ->registerModel(Teacher::class,['first_name','middle_name','last_name','email','id_no','emp_no','dob','designation','phone_no'])
                        ->registerModel(Staff::class,['first_name','middle_name','last_name','email','emp_no','id_no','dob','designation','phone_no'])
                        ->registerModel(Club::class,['name','code','reg_date'])
                        ->registerModel(Department::class,['name','code','phone_no','head_name','asshead_name','motto','vision'])
                        ->registerModel(Dormitory::class,['name','code','bed_no','dom_head'])
                        ->registerModel(Subject::class,['name','code'])
                        ->registerModel(Kitchen::class,['name','code'])
                        ->registerModel(Hall::class,['name','code'])
                        ->registerModel(Stream::class,['name','code'])
                        ->registerModel(Exam::class,['name','code','start_date','end_date'])
                        ->registerModel(Farm::class,['name','code'])
                        ->registerModel(Field::class,['name','code'])
                        ->registerModel(Game::class,['name','code'])
                        ->registerModel(Intake::class,['name','desc'])
                        ->registerModel(Library::class,['name','phone_no','lib_head','lib_asshead'])
                        ->registerModel(Meeting::class,['name','agenda','date','venue','code'])
                        ->registerModel(Note::class,['desc'])
                        ->registerModel(ReportCard::class,['name'])
                        ->registerModel(Reward::class,['name','purpose','date'])
                        ->registerModel(StreamSubjectTeacher::class,['desc'])
                        ->registerModel(Timetable::class,['desc'])
                        ->perform($searchterm);

        return view('admin.search',compact('searchResults','searchterm'));
    }
}
