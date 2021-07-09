<?php

namespace App\Http\Controllers\Admin;

use App\Imports\StudentsImport;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExportImportStudentController extends Controller
{
    //
    public function importStudents(Request $request)
    {
    	$this->validate($request,[
    			'file' => 'required|file|mimes:xls,xlsx'
    		]);

    	$file = $request->file('file');

    	Excel::import(new StudentsImport,$file);

    	return redirect()->back()->withSuccess('Student data imported successfully');
    }

    public function exportStudents()
    {
    	return Excel::download(new StudentsExport,'students.xlsx');
    }
}
