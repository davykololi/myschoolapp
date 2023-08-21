<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\SchoolService;
use App\Services\AccountantService as AccService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AccFormRequest as StoreRequest;
use App\Http\Requests\AccFormRequest as UpdateRequest;

class AccountantController extends Controller
{
    protected $accService;
    protected $schoolService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AccService $accService,SchoolService $schoolService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('superadmin2fa');
        $this->accService = $accService;
        $this->schoolService = $schoolService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accountants = $this->accService->all();

        return view('superadmin.accountants.index',compact('accountants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('superadmin.accountants.create');
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
        $accountant = $this->accService->create($request);

        return redirect()->route('superadmin.accountants.index')->withSuccess(ucwords($accountant->full_name." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $accountant = $this->accService->getId($id);

        return view('superadmin.accountants.show',compact('accountant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $accountant = $this->accService->getId($id);

        return view('superadmin.accountants.edit',compact('accountant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $accountant = $this->accService->getId($id);
        if($accountant){
            Storage::delete('public/storage/'.$accountant->image);
            $this->accService->update($request,$id);

            return redirect()->route('superadmin.accountants.index')->withSuccess(ucwords($accountant->full_name." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $accountant = $this->accService->getId($id);
        if($accountant){
            Storage::delete('public/storage/'.$accountant->image);
            $this->accService->delete($id);

            return redirect()->route('superadmin.accountants.index')->withSuccess(ucwords($accountant->full_name." ".'info deleted successfully'));
        }
    }
}
