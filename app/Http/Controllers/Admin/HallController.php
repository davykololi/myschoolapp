<?php

namespace App\Http\Controllers\Admin;

use App\Services\HallService;
use App\Services\HallCatService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HallFormRequest as StoreRequest;
use App\Http\Requests\HallFormRequest as UpdateRequest;

class HallController extends Controller
{
    protected $hallService,$hallCatService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HallService $hallService,HallCatService $hallCatService)
    {
        $this->middleware('auth:admin');
        $this->hallService = $hallService;
        $this->hallCatService = $hallCatService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $halls = $this->hallService->all();

        return view('admin.halls.index',['halls'=>$halls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoryHalls = $this->hallCatService->all();

        return view('admin.halls.create',compact('categoryHalls'));
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
        $hall = $this->hallService->create($request);

        return redirect()->route('admin.halls.index')->withSuccess(ucwords($hall->name." ".'info created successfully'));
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
        $hall = $this->hallService->getId($id);

        return view('admin.halls.show',['hall'=>$hall]);
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
        $hall = $this->hallService->getId($id);
        $categoryHalls = $this->hallCatService->all();

        return view('admin.halls.edit',compact('hall','categoryHalls'));
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
        $hall = $this->hallService->getId($id);
        if($hall){
            $this->hallService->update($request,$id);

            return redirect()->route('admin.halls.index')->withSuccess(ucwords($hall->name." ".'info updated successfully'));
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
        $hall = $this->hallService->getId($id);
        if($hall){
            $this->hallService->delete($id);

            return redirect()->route('admin.halls.index')->withSuccess(ucwords($hall->name." ".'info deleted successfully'));
        }
    }
}
