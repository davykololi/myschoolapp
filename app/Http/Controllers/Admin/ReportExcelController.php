<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ReportsImport;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportExcelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */

    public function importExportView()
    {
    	return view('admin.report-excel.report_import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function exportReport($type)
    {
    	return \Excel::download(new ReportsExport,'reports.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function importReport(Request $request)
    {
    	\Excel::import(new ReportsImport,request()->file('file'));

        \Session::put('success', 'Your file is imported successfully in database.');

    	return back();
    }
}
