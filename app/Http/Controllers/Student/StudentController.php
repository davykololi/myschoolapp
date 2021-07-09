<?php

namespace App\Http\Controllers\Student;

use Auth;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Club;
use App\Models\Teacher;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\StandardSubject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Facades\jpmurray\LaravelCountdown\Countdown;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:student');
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

    public function showClub(Club $club)
    {
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

    public function teacherDetails(Teacher $teacher,Stream $stream)
    {

        return view('student.teacher_details',compact('teacher','stream'));
    }

    public function subjectNotes(StandardSubject $standardSubject)
    {
         $user = Auth::user();
        
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
        foreach($borrowedBooks as $borrowedBook){
            $issuedDate = $borrowedBook->issued_date;
            $returnDate = $borrowedBook->return_date;
        }

            $timeNow = Carbon::today();
            $diff_days = $timeNow->diffInDays($returnDate);
            
            $countdown = Countdown::from(now())->to(now()->addDays($diff_days))->get();
            $days = $countdown->toHuman();

        return view('student.library_borrowedbooks',compact('user','borrowedBooks','days')); 
    }
}
