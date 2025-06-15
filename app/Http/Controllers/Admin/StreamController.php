<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Models\Assignment;
use App\Models\Exam;
use App\Models\Meeting;
use App\Models\Award;
use App\Models\Subject;
use App\Services\StreamService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    protected $streamService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamService $streamService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->streamService = $streamService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $streams = $this->streamService->all();

        return view('admin.streams.index',compact('streams'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        //
        $data['stream'] = $this->streamService->getId($id);
        $data['teachers'] = Teacher::all();
        $data['streamTeachers'] = $data['stream']->teachers()->eagerLoaded()->get();
        $data['assignments'] = Assignment::all();
        $data['streamAssignments'] = $data['stream']->assignments()->eagerLoaded()->get();
        $data['exams'] = Exam::all();
        $data['streamExams'] = $data['stream']->exams()->eagerLoaded()->get();
        $data['meetings'] = Meeting::all();
        $data['streamMeetings'] = $data['stream']->meetings()->eagerLoaded()->get();
        $data['awards'] = Award::all();
        $data['streamAwards'] = $data['stream']->awards()->eagerLoaded()->get();
        $data['subjects'] = Subject::all();
        $data['streamSubjects'] = $data['stream']->subjects()->eagerLoaded()->get();
        $data['streamStudents'] = $data['stream']->students->count();
        $data['females'] = $data['stream']->females();
        $data['males'] = $data['stream']->males();

        return view('admin.streams.show',$data);
    }
}
