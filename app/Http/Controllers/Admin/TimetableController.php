<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Timetable;
use App\Services\TimetableService;
use App\Services\StreamService;
use App\Services\ClassService;
use App\Services\ExamService;
use App\Services\TeacherService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TimetableFormRequest as StoreRequest;
use App\Http\Requests\TimetableFormRequest as UpdateRequest;

class TimetableController extends Controller
{
    protected $timetableService,$streamService,$classService,$examService,$teacherService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TimetableService $timetableService,StreamService $streamService,ClassService $classService,ExamService $examService,TeacherService $teacherService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->timetableService = $timetableService;
        $this->streamService = $streamService;
        $this->classService = $classService;
        $this->examService = $examService;
        $this->teacherService = $teacherService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user = Auth::user();
        $search = strtolower($request->search);
        if($user->hasRole('admin')){
            if($search){
                $timetables = Timetable::whereLike(['exam.name', 'exam.type', 'exam.start_date', 'exam.end_date','stream.name', 'class.name'], $search)->eagerLoaded()->paginate(15);

                return view('admin.timetables.index',['timetables'=>$timetables]);
            } else {
                $timetables = $this->timetableService->paginated();

                return view('admin.timetables.index',['timetables'=>$timetables]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $streams = $this->streamService->all();
        $classes = $this->classService->all();
        $teachers = $this->teacherService->all();
        $exams = $this->examService->all();

        return view('admin.timetables.create',compact('streams','classes','teachers','exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        $timetable = $this->timetableService->create($request);

        return redirect()->route('admin.timetables.index')->withSuccess(ucwords($timetable->desc." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $timetable = $this->timetableService->getId($id);
        $timetableStreamName = $timetable->stream->name;

        return view('admin.timetables.show',compact('timetable','timetableStreamName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $timetable = $this->timetableService->getId($id);
        $streams = $this->streamService->all();
        $classes = $this->classService->all();
        $teachers = $this->teacherService->all();
        $exams = $this->examService->all();
    
        return view('admin.timetables.edit',compact('timetable','streams','classes','teachers','exams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $timetable = $this->timetableService->getId($id);
        if($timetable){
            Storage::delete('public/files/'.$timetable->file);
            $this->timetableService->update($request,$id);

            return redirect()->route('admin.timetables.index')->withSuccess(ucwords($timetable->desc." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $timetable = $this->timetableService->getId($id);
        if($timetable){
            Storage::delete('public/files/'.$timetable->file);
            $this->timetableService->delete($id);

            return redirect()->route('admin.timetables.index')->withSuccess(ucwords($timetable->desc." ".'info deleted successfully'));
        }
    }
}
