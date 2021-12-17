<?php

namespace App\Http\Controllers\Student;

use Auth;
use Carbon\Carbon;
use App\Models\Book;
use App\Repositories\ClubRepository as ClubRepo;
use App\Repositories\TeacherRepository as TeacherRepo;
use App\Repositories\StreamRepository as StreamRepo;
use App\Repositories\SubjectRepository as SubjectRepo;
use App\Repositories\StdSubjectRepository as ClassSubjectRepo;
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
        $this->clubRepo = $clubRepo;
        $this->teacherRepo = $teacherRepo;
        $this->streamRepo = $streamRepo;
        $this->subjectRepo = $subjectRepo;
        $this->classSubjectRepo = $classSubjectRepo;
    }

    public function index()
    {
    	return view('student');
    }

    public function assignments()
    {
        $user = Auth::user()->with('assignments','stream','teachers')->first();

        return view('student.stream_assignments',['user'=>$user]);
    }

    public function students()
    {
        $user = Auth::user();

        return view('student.stream_students',['user'=>$user]);
    }

    public function teachers()
    {
        $user = Auth::user();
        $streamTimetable = $user->stream->timetable;

        return view('student.stream_teachers',['user'=>$user,'streamTimetable'=>$streamTimetable]);
    }

    public function exams()
    {
        $user = Auth::user();
        $streamExams = $user->stream->exams;

        return view('student.stream_exams',['user'=>$user,'streamExams'=>$streamExams]);
    }

    public function showClub($id)
    {
        $club = $this->clubRepo->getId($id);
        $user = Auth::user();

        return view('student.student_club',['user'=>$user,'club'=>$club]);
    }

    public function meetings()
    {
        $user = Auth::user();

        return view('student.stream_meetings',['user'=>$user]);
    }

    public function rewards()
    {
        $user = Auth::user();

        return view('student.stream_rewards',['user'=>$user]);
    }

    public function streamSubjects()
    {
        $user = Auth::user();
        $standardSubjects = $user->stream->standard_subjects;

        return view('student.stream_subjects',['user'=>$user,'standardSubjects'=>$standardSubjects]);
    }

    public function teacherDetails($id)
    {
        $teacher = $this->teacherRepo->getId($id);
        $stream = $this->streamRepo->getId($id);

        return view('student.teacher_details',compact('teacher','stream'));
    }

    public function subjectNotes($id)
    {
         $user = Auth::user();
         $standardSubject = $this->classSubjectRepo->getId($id);
        
        return view('student.subject_notes',compact('user','standardSubject'));
    }

    public function libraryBooks()
    {
        $user = Auth::user();
        $books = Book::with('library')->get();

        return view('student.library_books',compact('user','books'));
    }

    public function schoolFields()
    {
        $user = Auth::user();
        $fields = $user->school->fields;

        return view('student.school_fields',compact('user','fields'));
    }

    public function schoolHalls()
    {
        $user = Auth::user();
        $halls = $user->school->halls;

        return view('student.school_halls',compact('user','halls'));
    }

    public function borrowedBooks()
    {
        $user = Auth::user();
        $borrowedBooks = $user->issued_books;

        return view('student.library_borrowedbooks',compact('user','borrowedBooks',));
    }
}
