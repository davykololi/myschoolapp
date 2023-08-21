<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Services\StreamService;
use App\Services\TeacherService;
use App\Services\SubjectService;
use App\Http\Controllers\Controller;
use App\Services\StdSubjectService;
use App\Models\Stream;
use App\Models\StreamSubjectTeacher;
use Illuminate\Http\Request;
use App\Http\Requests\StdSubjectFormRequest as StoreRequest;
use App\Http\Requests\StdSubjectFormRequest as UpdateRequest;

class StreamSubjectTeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
        $this->middleware('superadmin2fa');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['school_id'] = Auth::user()->school->id;
        $data['stream_id'] = $request->stream_id;
        $data['teacher_id'] = $request->teacher_id;
        $data['subject_id'] = $request->subject_id;
        if(is_null($data['desc']) || is_null($data['teacher_id']) || is_null($data['subject_id'])){
            return back()->withErrors('Please assign subjects to this stream before proceeding with this procedure');
        }
        $stream = Stream::where('id',$data['stream_id'])->first();
        $streamSubjectTeacher = StreamSubjectTeacher::create($data);

        return redirect()->back()->withSuccess($stream->name." ".$streamSubjectTeacher->subject->name.' '.'subject assigned to'.' '.$streamSubjectTeacher->teacher->salutation.' '.$streamSubjectTeacher->teacher->full_name);
    }

    public function edit($id)
    {

        return view('superadmin.subject_teachers.edit');
    }

    public function update(Request $request, $id)
    {
        $strmSubTeacher = StreamSubjectTeacher::find($id);
        $data = $request->all();
        $data['school_id'] = Auth::user()->school->id;
        $data['stream_id'] = $request->stream;
        $data['teacher_id'] = $request->teacher;
        $data['subject_id'] = $request->subject;
        $$strmSubTeacher->update($data);

        return redirect()->back();
    }
    
    public function removeStreamSubjectTeacher($id)
    {
        $strmSubTeacher = StreamSubjectTeacher::find($id)->delete();

        return back()->withSuccess('The teacher removed from this class successfully');
    }
}
