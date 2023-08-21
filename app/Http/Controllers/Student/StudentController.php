<?php

namespace App\Http\Controllers\Student;

use Auth;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Note;
use App\Models\StreamSubjectTeacher;
use App\Repositories\ClubRepository as ClubRepo;
use App\Repositories\TeacherRepository as TeacherRepo;
use App\Repositories\StreamRepository as StreamRepo;
use App\Repositories\SubjectRepository as SubjectRepo;
use App\Repositories\StreamSubjectTeacherRepository as ClassSubjectRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Facades\jpmurray\LaravelCountdown\Countdown;

class StudentController extends Controller
{
    protected $clubRepo,$teacherRepo,$streamRepo,$subjectRepo,$classSubjectRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( ClubRepo $clubRepo,TeacherRepo $teacherRepo,StreamRepo $streamRepo,SubjectRepo $subjectRepo,ClassSubjectRepo $classSubjectRepo)
    {
        $this->middleware('auth:student');
        $this->middleware('student2fa');
        $this->clubRepo = $clubRepo;
        $this->teacherRepo = $teacherRepo;
        $this->streamRepo = $streamRepo;
        $this->subjectRepo = $subjectRepo;
        $this->classSubjectRepo = $classSubjectRepo;
    }

    public function index()
    {
    	return view('student.student');
    }

    public function streamAssignments()
    {
        $user = Auth::user();
        $streamAssignments = $user->stream->assignments()->with('streams','teachers')->latest('id')->get();
        $title = $user->stream->name. " "."Assignments";

        return view('student.stream_assignments',['user'=>$user,'streamAssignments'=>$streamAssignments,'title'=>$title]);
    }

    public function streamStudents()
    {
        $user = Auth::user();
        $title = $user->stream->name. " "."Students";
        $streamStudents = $user->stream->students()->with('stream')->get();

        return view('student.stream_students',['user'=>$user,'title'=>$title,'streamStudents'=>$streamStudents]);
    }

    public function streamTeachers()
    {
        $user = Auth::user();
        $streamTimetables = $user->stream->timetables;
        $streamSubjectTeachers = $user->stream->stream_subject_teachers()->with('teacher','stream','school','subject')->get();
        $title = $user->stream->name. " "."Teachers";

        return view('student.stream_teachers',['user'=>$user,'streamTimetables'=>$streamTimetables,'streamSubjectTeachers'=>$streamSubjectTeachers,'title'=>$title]);
    }

    public function streamExams()
    {
        $user = Auth::user();
        $streamExams = $user->stream->exams()->with('streams','school','year','term','timetables')->get();
        $title = $user->stream->name. " "."Exams";

        return view('student.stream_exams',['user'=>$user,'streamExams'=>$streamExams,'title'=>$title]);
    }

    public function showClub($id)
    {
        $club = $this->clubRepo->getId($id)->with('school')->first();
        $user = Auth::user();
        $title = $club->name;

        return view('student.student_club',['user'=>$user,'club'=>$club,'title'=>$title]);
    }

    public function streamMeetings()
    {
        $user = Auth::user();
        $title = $user->stream->name. " "."Meetings";

        return view('student.stream_meetings',['user'=>$user,'title'=>$title]);
    }

    public function streamAwards()
    {
        $user = Auth::user();
        $title = $user->stream->name. " "."Awards";

        return view('student.stream_rewards',['user'=>$user,'title'=>$title]);
    }

    public function teacherDetails($id)
    {
        $teacher = $this->teacherRepo->getId($id);
        $stream = $this->streamRepo->getId($id);
        $title = "Teacher Details";

        return view('student.teacher_details',compact('teacher','stream','title'));
    }

    public function subjectNotes($id)
    {
         $user = Auth::user();
         $subject = $this->subjectRepo->getId($id);
         $subjectTeacher = StreamSubjectTeacher::where(['stream_id'=>auth()->user()->stream->id,'subject_id'=>$subject->id])->with('teacher','subject','stream')->first();

        return view('student.subject_notes',compact('user','subject','subjectTeacher'));
    }

    public function libraryBooks()
    {
        $user = Auth::user();
        $books = Book::with('library','category_book')->get();
        $title = "Library Books";

        return view('student.library_books',compact('user','books','title'));
    }

    public function schoolFields()
    {
        $user = Auth::user();
        $fields = $user->school->fields;
        $title = "School Fields";

        return view('student.school_fields',compact('user','fields','title'));
    }

    public function schoolHalls()
    {
        $user = Auth::user();
        $halls = $user->school->halls;
        $title = "School Halls";

        return view('student.school_halls',compact('user','halls','title'));
    }

    public function borrowedBooks()
    {
        $user = Auth::user();
        $borrowedBooks = $user->issued_books;
        $title = "Borrowed Books";

        return view('student.library_borrowedbooks',compact('user','borrowedBooks','title'));
    }
}
