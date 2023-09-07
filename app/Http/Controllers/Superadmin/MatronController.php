<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\SchoolService;
use App\Services\MatronService as MatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MatronFormRequest as StoreRequest;
use App\Http\Requests\MatronFormRequest as UpdateRequest;

class MatronController extends Controller
{
    protected $matService;
    protected $schoolService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MatService $matService,SchoolService $schoolService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('banned');
        $this->middleware('superadmin2fa');
        $this->matService = $matService;
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
        $matrons = $this->matService->all();

        return view('superadmin.matrons.index',compact('matrons'));
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

        return view('superadmin.matrons.create',compact('schools'));
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
        $matron = $this->matService->create($request);

        return redirect()->route('superadmin.matrons.index')->withSuccess(ucwords($matron->full_name." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matron  $matron
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $matron = $this->matService->getId($id);

        return view('superadmin.matrons.show',compact('matron'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matron  $matron
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $matron = $this->matService->getId($id);
        $schools = $this->schoolService->all();

        return view('superadmin.matrons.edit',compact('matron','schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matron  $matron
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $matron = $this->matService->getId($id);
        if($matron){
            Storage::delete('public/storage/'.$matron->image);
            $this->matService->update($request,$id);

            return redirect()->route('superadmin.matrons.index')->withSuccess(ucwords($matron->name." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matron  $matron
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $matron = $this->matService->getId($id);
        if($matron){
            Storage::delete('public/storage/'.$matron->image);
            $this->matService->delete($id);

            return redirect()->route('superadmin.matrons.index')->withSuccess(ucwords($matron->name." ".'info deleted successfully'));
        }
    }
}
