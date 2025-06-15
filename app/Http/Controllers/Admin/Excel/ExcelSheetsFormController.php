<?php

namespace App\Http\Controllers\Admin\Excel;

use App\Services\StreamService;
use App\Services\ClassService;
use App\Services\ExamService;
use App\Models\Stream;
use App\Models\Exam;
use App\Exports\StreamStudentsExport;
use App\Exports\EmptyStreamMarksheetFormExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExcelSheetsFormController extends Controller
{
    protected $streamService, $classService, $examService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamService $streamService, ClassService $classService, ExamService $examService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->streamService = $streamService;
        $this->classService = $classService;
        $this->examService = $examService;
    }

    public function emptyStreamMarksheetForm(Request $request)
    {
        $streams = $this->streamService->all();
        $classes = $this->classService->all();
        $exams = $this->examService->all();

        return view('admin.excel.empty_excel_sheet_form',compact('streams','classes','exams'));
    }

    public function streamStudentsExcelMarksheet(Request $request)
    {
        $streamId = $request->stream_id;
        $examId = $request->exam_id;

        if((is_null($streamId)) || is_null($examId)){
            return back()->withError('Please fill in the required details before you proceed!');
        }

        $stream = Stream::whereId($streamId)->firstOrFail();
        $exam = Exam::whereId($examId)->firstOrFail();
        $streamStudents = $stream->students;
        if($streamStudents->isEmpty()){
            return back()->withError($stream->name." "."has no students at the moment");
        }

        return Excel::download(new EmptyStreamMarksheetFormExport($stream,$exam),$stream->name." ".$exam->name." ".'Results Form.xlsx');
    }

    public function excelStreamStudents(Request $request)
    {
        $streamId = $request->stream_id;
        if(is_null($streamId)){
            return back()->withError('Please select the stream before you proceed!');
        }
        $stream = Stream::whereId($streamId)->firstOrFail();

        return Excel::download(new StreamStudentsExport($stream),$stream->name." ".'Students'.'.xlsx');
    }
}
