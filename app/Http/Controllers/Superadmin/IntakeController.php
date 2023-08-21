<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\IntakeService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\IntakeFormRequest as StoreRequest;
use App\Http\Requests\IntakeFormRequest as UpdateRequest;

class IntakeController extends Controller
{
    protected $intakeService;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( IntakeService $intakeService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('superadmin2fa');
        $this->intakeService = $intakeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $intakes = $this->intakeService->all();

        return view('superadmin.intakes.index',compact('intakes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.intakes.create');
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
        $intake = $this->intakeService->create($request);

        return redirect()->route('superadmin.intakes.index')->withSuccess(ucwords($intake->name." ".'info created successfully'));
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
        $intake = $this->intakeService->getId($id);

        return view('superadmin.intakes.show',['intake'=>$intake]);
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
        $intake = $this->intakeService->getId($id);

        return view('superadmin.intakes.edit',compact('intake'));
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
        $intake = $this->intakeService->getId($id);
        if($intake){
            $this->intakeService->update($request,$id);

            return redirect()->route('superadmin.intakes.index')->withSuccess(ucwords($intake->name." ".'info updated successfully'));
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
        $intake = $this->intakeService->getId($id);
        if($intake){
            $this->intakeService->delete($id);
            
            return redirect()->route('superadmin.intakes.index')->withSuccess(ucwords($intake->name." ".'info deleted successfully'));
        }
    }
}
