<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\YearService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\YearFormRequest as StoreRequest;
use App\Http\Requests\YearFormRequest as UpdateRequest;

class YearController extends Controller
{
    protected $yearService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(YearService $yearService)
    {
        $this->middleware('auth:superadmin');
        $this->yearService = $yearService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $years = $this->yearService->all();

        return view('superadmin.years.index',compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.years.create');
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
        $year = $this->yearService->create($request);

        return redirect()->route('superadmin.years.index')->withSuccess(ucwords($year->year." ".'info created successfully!!'));
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
        $year = $this->yearService->getId($id);

        return view('superadmin.years.show',compact('year'));
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
        $year = $this->yearService->getId($id);

        return view('superadmin.years.edit',compact('year'));
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
        $year = $this->yearService->getId($id);
        if($year){
            $this->yearService->update($request,$id);

            return redirect()->route('superadmin.years.index')->withSuccess(ucwords($year->year." ".'info updated successfully!!'));
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
        $year = $this->yearService->getId($id);
        if($year){
            $this->yearService->delete($id);

            return redirect()->route('superadmin.years.index')->withSuccess(ucwords($year->year." ".'info deleted successfully!!'));
        }
            return redirect()->route('superadmin.years.index')->withErrors('Sorry!!, Something wrong happened!, Try again');
    }
}
