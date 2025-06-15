<?php

namespace App\Http\Controllers\Admin;

use App\Models\StreamSection;
use App\Services\IntakeService;
use App\Services\DormitoryService;
use App\Imports\StudentsSheetImport\StudentsSheetImport;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportImportStudentController extends Controller
{
    protected $intakeService, $dormService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IntakeService $intakeService, DormitoryService $dormService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->intakeService = $intakeService;
        $this->dormService = $dormService;
    }

    public function studentsImportForm()
    {
        $intakes = $this->intakeService->all();
        $dormitories = $this->dormService->all();
        
        return view('admin.imports.students_import_form',compact('intakes','dormitories'));
    }
    
    public function importStudentsStore(Request $request)
    {
        $dormId = $request->dorm_id;
        $intakeId = $request->intake_id;

        $north = StreamSection::whereName('North')->firstOrFail();
        $northId = $north->id;
        $south = StreamSection::whereName('South')->firstOrFail();
        $southId = $south->id;
        $west = StreamSection::whereName('West')->firstOrFail();
        $westId = $west->id;
        $east = StreamSection::whereName('East')->firstOrFail();
        $eastId = $east->id;

    	$this->validate($request,[
    			'file' => 'required|file|mimes:xls,xlsx'
    		]);

    	$file = $request->file('file');

        if(!$file){
            return back()->withErrors('Select the appropriate file for upload!');
        }

    	Excel::import(new StudentsSheetImport($dormId,$intakeId,$northId,$southId,$westId,$eastId),$file);

    	return redirect()->back()->withSuccess('Student data imported successfully');
    }

    public function exportStudents()
    {
    	return Excel::download(new StudentsExport,'students.xlsx');
    }
}
