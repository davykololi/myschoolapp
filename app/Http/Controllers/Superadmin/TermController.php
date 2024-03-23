<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\TermService;
use App\Services\SchoolService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TermFormRequest as StoreRequest;
use App\Http\Requests\TermFormRequest as UpdateRequest;

class TermController extends Controller
{
    protected $termService;
    protected $schoolService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TermService $termService,SchoolService $schoolService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->termService = $termService;
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
        $terms = $this->termService->all();

        return view('superadmin.terms.index',compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $schools = $this->schoolService->all();

        return view('superadmin.terms.create',compact('schools'));
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
        $term = $this->termService->create($request);

        return redirect()->route('superadmin.terms.index')->withSuccess(ucwords($term->name." ".'info created successfully!!'));
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
        $term = $this->termService->getId($id);

        return view('superadmin.terms.show',compact('term'));
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
        $term = $this->termService->getId($id);
        $schools = $this->schoolService->all();

        return view('superadmin.terms.edit',compact('term','schools'));
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
        $term = $this->termService->getId($id);
        if($term){
            $this->termService->update($request,$id);

            return redirect()->route('superadmin.terms.index')->withSuccess(ucwords($term->name." ".'info updated successfully!!'));
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
        $term = $this->termService->getId($id);
        if($term){
        	$this->termService->delete($id);

        	return redirect()->route('superadmin.terms.index')->withSuccess(ucwords($term->name." ".'info deleted successfully!!'));
        }
        	return redirect()->route('superadmin.terms.index')->withErrors('Sorry!!, Something wrong happened!, Try again');
    }
}
