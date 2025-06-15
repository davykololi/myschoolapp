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
use App\Services\TimetableService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Charts\StudentExamsMiniScoresChart;
use App\Charts\StudentExamSubjectsResultsChart;
use Facades\jpmurray\LaravelCountdown\Countdown;

class StudentController extends Controller
{
    protected $clubService, $teacherService, $streamService, $subjectService, $streamSubjectService, $studentExamsMiniScoresChart, $studentExamSubjectsResultsChart, $timetableService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( ClubService $clubService,TeacherService $teacherService,StreamService $streamService,SubjectService $subjectService,StreamSubjectService $streamSubjectService,StudentExamsMiniScoresChart $studentExamsMiniScoresChart,StudentExamSubjectsResultsChart $studentExamSubjectsResultsChart,TimetableService $timetableService)
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
        $this->studentExamsMiniScoresChart = $studentExamsMiniScoresChart;
        $this->studentExamSubjectsResultsChart = $studentExamSubjectsResultsChart;
        $this->timetableService = $timetableService;
    }

    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $marks = Mark::with('exam')->where(['admission_no'=>$user->student->admission_no,'name'=>$user->full_name])->get();
            if($marks->isNotEmpty()){
                $studentExamsMiniScoresChart = $this->studentExamsMiniScoresChart;
                $studentExamSubjectsResultsChart = $this->studentExamSubjectsResultsChart;

                return view('student.student_dashboard_with_results',['studentExamsMiniScoresChart'=>$studentExamsMiniScoresChart->build(),'studentExamSubjectsResultsChart'=>$studentExamSubjectsResultsChart->build()]);
            } else {
                return view('student.student_dashboard_without_results');
            }
            
        }
    }

    public function streamAssignments()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $streamAssignments = $user->student->stream->assignments()->with('teachers')->latest('id')->paginate(15);
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

            $timetables = $this->timetableService->all();
            $filteredTimetable = $timetables->filter(function($timetable,$key){
                return ($timetable->stream_id === Auth::user()->student->stream_id) && ($timetable->exam_id === null);
            });

            return view('student.stream_teachers',['user'=>$user,'streamTimetables'=>$streamTimetables,'streamSubjects'=>$streamSubjects,'title'=>$title,'filteredTimetable'=>$filteredTimetable]);
        } 
    }

    public function streamExams()
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $streamExams = $user->student->stream->exams()->eagerLoaded()->get();
            $examTimetables = $user->student->stream->timetables()->with('exam')->get();
            $title = $user->student->stream->name. " "."Exam Schedule";
            return view('student.stream_exams',compact('user','streamExams','examTimetables','title'));
        }
    }

    public function showClub($id)
    {
        $user = Auth::user();
        if($user->hasRole('student')){
            $club = $this->clubService->getId($id)->with('school')->firstOrFail();
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
            $streamAwards = $user->student->stream->awards;
            return view('student.stream_awards',compact('user','title','streamAwards'));
        }
    }

    public function streamSubjectNotes(Request $request,Subject $subject, Teacher $teacher)
    {
        $user = Auth::user();
        $search = strtolower($request->search);
        if($user->hasRole('student')){
            $streamSubject = StreamSubject::where(['subject_id'=>$subject->id,'stream_id'=>$user->student->stream_id,'teacher_id'=>$teacher->id])->first();
            if($search){
                $streamSubjectNotes = $streamSubject->subject->notes()->eagerLoaded()->where('desc','like',"%$search%")->paginate(50);

                return view('student.subject_notes',compact('subject','teacher','user','streamSubject','streamSubjectNotes'));
            } else {
                $streamSubjectNotes = $streamSubject->subject->notes()->eagerLoaded()->latest('id')->paginate(50);

                return view('student.subject_notes',compact('subject','teacher','user','streamSubject','streamSubjectNotes'));
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

    public function libraryBooks(Request $request)
    {
        $user = Auth::user();
        $search = strtolower($request->search);
        if(($user->hasRole('student')) && ($search)){
            $books = Book::with('library','category_book')->whereLike(['title', 'author', 'rack_no', 'row_no', 'category_book.name','library.name'], $search)->eagerLoaded()->paginate(15);
            $title = "Search Library Books";
            return view('student.library_books',compact('user','books','title'));
        } elseif($user->hasRole('student')) {
            $books = Book::eagerLoaded()->paginate(15);
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
            $borrowedBooks = $user->student->issued_books;
            $title = "Borrowed Books";
            return view('student.library_borrowedbooks',compact('user','borrowedBooks','title'));
        }  
    }
}
