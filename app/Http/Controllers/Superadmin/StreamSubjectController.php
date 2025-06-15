<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Services\StreamService;
use App\Services\TeacherService;
use App\Services\SubjectService;
use App\Http\Controllers\Controller;
use App\Models\Stream;
use App\Models\StreamSubject;
use App\Services\StreamSubjectService;
use Illuminate\Http\Request;

class StreamSubjectController extends Controller
{
    protected $streamSubjectService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamSubjectService $streamSubjectService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->streamSubjectService = $streamSubjectService;
    }

    public function store(Request $request)
    {
        $data ['desc']= $request->desc;
        $data['school_id'] = Auth::user()->school->id;
        $data['stream_id'] = $request->stream_id;
        $data['teacher_id'] = $request->teacher_id;
        $data['subject_id'] = $request->subject_id;
        if(is_null($data['desc']) || is_null($data['teacher_id']) || is_null($data['subject_id'])){
            return back()->withErrors('Please assign subjects to this stream before proceeding with this procedure');
        }
        $stream = Stream::where('id',$data['stream_id'])->first();
        $streamSubject = StreamSubject::create($data);

        return redirect()->back()->withSuccess($stream->name." ".$streamSubject->subject->name.' '.'subject assigned to'.' '.$streamSubject->teacher->user->salutation.' '.$streamSubject->teacher->user->full_name);
    }

    public function edit($id)
    {
        return view('superadmin.subject_teachers.edit');
    }

    public function update(Request $request, $id)
    {
        $strmSubject = StreamSubject::find($id);
        $data ['desc']= $request->desc;
        $data['school_id'] = Auth::user()->school->id;
        $data['stream_id'] = $request->stream_id;
        $data['teacher_id'] = $request->teacher_id;
        $data['subject_id'] = $request->subject_id;
        $strmSubject->update($data);

        return redirect()->back();
    }
    
    public function removeStreamSubject($id)
    {
        $user = Auth::user();
        $strmSubject = StreamSubject::find($id);
        if($user->hasRole('superadmin') && ($strmSubject)){
            $strmSubject->delete();

            return back()->withSuccess('The teacher removed from this class successfully');
        }
        return back()->withErrors('An error occured while deleting. Please try again later');
    }
}
