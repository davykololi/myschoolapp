<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\StreamSecService;
use App\Services\SchoolService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StreamSecFormRequest as StoreRequest;
use App\Http\Requests\StreamSecFormRequest as UpdateRequest;

class StreamSectionController extends Controller
{
    protected $streamSecService;
    protected $schoolService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamSecService $streamSecService,SchoolService $schoolService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('banned');
        $this->middleware('superadmin2fa');
        $this->streamSecService = $streamSecService;
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
        $streamSections = $this->streamSecService->all();

        return view('superadmin.stream-sections.index',compact('streamSections'));
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

        return view('superadmin.stream-sections.create',compact('schools'));
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
        $streamSection = $this->streamSecService->create($request);

        return redirect()->route('superadmin.stream-sections.index')->withSuccess(ucwords($streamSection->name." ".'info created successfully'));
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
        $streamSection = $this->streamSecService->getId($id);

        return view('superadmin.stream-sections.show',compact('streamSection'));
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
        $streamSection = $this->streamSecService->getId($id);
        $schools = $this->schoolService->all();

        return view('superadmin.stream-sections.edit',compact('streamSection','schools'));
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
        $streamSection = $this->streamSecService->getId($id);
        if($streamSection){
            $this->streamSecService->update($request,$id);

            return redirect()->route('superadmin.stream-sections.index')->withSuccess(ucwords($streamSection->name." ".'info updated successfully'));
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
        $streamSection = $this->streamSecService->getId($id);
        if($streamSection->hasStreams){
            return back()->withErrors(($stream->name." ".'has class streams and cant be deleted'));
        }
        if($streamSection){
            $this->streamSecService->delete($id);

            return redirect()->route('superadmin.stream-sections.index')->withSuccess(ucwords($streamSection->name." ".'info deleted successfully'));
        }
    }
}
