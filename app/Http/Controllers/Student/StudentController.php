<?php

namespace App\Http\Controllers\Student;

use Auth;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Note;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Mark;
use App\Models\Assignment;
use App\Models\StreamSubject;
use App\Services\ClubService;
use App\Services\TeacherService;
use App\Services\StreamService;
use App\Services\SubjectService;
use App\Services\StreamSubjectService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Facades\jpmurray\LaravelCountdown\Countdown;

class StudentController extends Controller
{
    protected $clubService, $teacherService, $streamService, $subjectService, $streamSubjectService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( ClubService $clubService,TeacherService $teacherService,StreamService $streamService,SubjectService $subjectService,StreamSubjectService $streamSubjectService)
    {
        $this->middleware('auth');
        $this->middleware('role:student');
        $this->middleware('student-banned');
        $this->middleware('checktwofa');
        $this->clubService = $clubService;
        $this->teacherService = $teacherService;
        $this->streamService = $streamService;
        $this->subjectService = $subjectService;
        $this->streamSubjectService = $streamSubjectService;
    }

    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $marks = Mark::with('exam')->where(['admission_no'=>auth()->user()->student->admission_no,'name'=>auth()->user()->full_name])->get();
            return view('student.student',compact('marks'));
        }
    }

    public function streamAssignments()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $streamAssignments = $user->student->stream->assignments()->with('teachers')->latest('id')->get();
            $title = $user->student->stream->name. " "."Assignments";

            if(!empty($streamAssignments)){
                foreach($streamAssignments as $assignment){
                    $assignmentTeachers = $assignment->teachers()->with('user')->get();

                    return view('student.stream_assignments',compact('user','streamAssignments','assignmentTeachers','title'));
                }
            }
            return view('student.stream_assignments',compact('user','streamAssignments','title'));
        } 
    }

    public function streamStudents()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $title = $user->student->stream->name. " "."Students";
            $streamStudents = $user->student->stream->students()->with('stream','user')->get();
            return view('student.stream_students',['user'=>$user,'title'=>$title,'streamStudents'=>$streamStudents]);
        }
    }

    public function streamTeachers()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $streamTimetables = $user->student->stream->timetables;
            $streamSubjects = $user->student->stream->stream_subjects()->eagerLoaded()->get();
            $title = $user->student->stream->name. " "."Teachers";
            return view('student.stream_teachers',['user'=>$user,'streamTimetables'=>$streamTimetables,'streamSubjects'=>$streamSubjects,'title'=>$title]);
        } 
    }

    public function streamExams()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $streamExams = $user->student->stream->exams()->eagerLoaded()->get();
            $examTimetables = $user->student->stream->timetables()->with('exam')->get();
            $title = $user->student->stream->name. " "."Exams";
            return view('student.stream_exams',compact('user','streamExams','examTimetables','title'));
        }
    }

    public function showClub($id)
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $club = $this->clubService->getId($id)->with('school')->first();
            $title = $club->name;
            return view('student.student_club',['user'=>$user,'club'=>$club,'title'=>$title]);
        }
    }

    public function streamMeetings()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $title = $user->student->stream->name. " "."Meetings";
            return view('student.stream_meetings',['user'=>$user,'title'=>$title]);
        }
    }

    public function streamAwards()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $title = $user->student->stream->name. " "."Awards";
            return view('student.stream_rewards',['user'=>$user,'title'=>$title]);
        }
    }

    public function teacherDetails($id)
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $teacher = $this->teacherService->getId($id);
            $stream = $this->streamService->getId($id);
            $title = "Teacher Details";
            return view('student.teacher_details',compact('teacher','stream','title'));
        }
    }

    public function streamSubjectNotes($id)
    {
        $user = Auth::user();
        $subject = Subject::where('id',$id)->first();
        $teacher = Teacher::where('id',$id)->first();
        if($user->hasRole('student')){
            $streamSubject = StreamSubject::where(['subject_id'=>$subject->id,'stream_id'=>$user->student->stream_id,'teacher_id'=>$teacher->id])->first();
            if(!is_null($streamSubject)){
                $streamSubjectNotes = $streamSubject->teacher->notes()->with('teacher','stream')->latest('id')->get();
                return view('student.subject_notes',compact('user','streamSubject','streamSubjectNotes'));
            }
        } 
    }

    public function streamOnlineNotes(Note $note)
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $title = $note->desc;
            return view('student.online_notes',compact('note','title'));
        }
    }

    public function libraryBooks()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $books = Book::with('library','category_book')->get();
            $title = "Library Books";
            return view('student.library_books',compact('user','books','title'));
        }
    }

    public function schoolFields()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $fields = $user->school->fields;
            $title = "School Fields";
            return view('student.school_fields',compact('user','fields','title'));
        }
    }

    public function schoolHalls()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $halls = $user->school->halls;
            $title = "School Halls";
            return view('student.school_halls',compact('user','halls','title'));
        }
    }

    public function borrowedBooks()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $borrowedBooks = $user->issued_books;
            $title = "Borrowed Books";
            return view('student.library_borrowedbooks',compact('user','borrowedBooks','title'));
        }  
    }
}
