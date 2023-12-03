<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsDeleteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('banned');
        $this->middleware('admin2fa');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $reports = DB::table('report_cards')->get();
        if(!$reports->isEmpty()){
            $reports = DB::table('reports_cards')->delete();

            return back()->withSuccess('The reports deleted successfully');
        }
          return back()->withErrors('There are no reports');  
    }
}
