<?php

namespace App\Http\Controllers\Admin\Pdf;

use PdfReport;
use App\Models\Year;
use App\Models\Term;
use App\Models\Exam;
use App\Models\Stream;
use App\Models\MyClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PdfSortResultsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin2fa');
    }

    public function sortClassResults(Request $request)
    {
        $yearId = 1;
        $termId = 3;
        $examId = 3;
        $classId = 1;
        $sortBy = $request->input('mathematics');
        $year = Year::whereId($yearId)->firstOrFail();
        $term = Term::whereId($termId)->firstOrFail();
        $exam = Exam::where(['year_id'=>$yearId,'term_id'=>$termId])->firstOrFail();
        $class = MyClass::where(['id'=>$classId,'school_id'=>auth()->user()->school->id])->firstOrFail();

        $title = $year->name." ".$term->name." ".$exam->name." ".$class->name." ".$sortBy." "."Results"; // Report title

        $meta = [ // For displaying filters description on header
            $title,
        ];

        $queryBuilder = Mark::select(['name', 'mathematics','english','kiswahili','chemistry','biology','physics','cre','islam','history','ghc']) // Do some querying..
                        ->where(['year_id'=>$year->id,'term_id'=>$term->id,'exam_id'=>$exam->id,'class_id'=>$class->id])
                        ->orderBy($sortBy);

        $columns = [ // Set Column to be displayed
            'Name' => 'name',
            'Maths' =>'mathematics',
            'English' =>'english',
            'Kiswahili' =>'kiswahili',
            'Chemistry' =>'chemistry',
            'Biology' =>'biology',
            'Physics' =>'physics',
            'CRE' =>'cre',
            'Islam' =>'islam',
            'History' =>'history',
            'GHC' =>'ghc',
        ];

        // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
        return PdfReport::of($title, $meta, $queryBuilder, $columns)
                    ->all() // Limit record to be showed
                    ->stream(); // other available method: store('path/to/file.pdf') to save to disk, download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }
}
