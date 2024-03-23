<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\HallService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HallFormRequest as StoreRequest;
use App\Http\Requests\HallFormRequest as UpdateRequest;

class HallController extends Controller
{
    protected $hallService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HallService $hallService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->hallService = $hallService;
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

        return view('superadmin.halls.index',['halls'=>$halls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.halls.create');
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

        return redirect()->route('superadmin.halls.index')->withSuccess(ucwords($hall->name." ".'info created successfully'));
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

        return view('superadmin.halls.show',['hall'=>$hall]);
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

        return view('superadmin.halls.edit',compact('hall'));
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

            return redirect()->route('superadmin.halls.index')->withSuccess(ucwords($hall->name." ".'info updated successfully'));
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

            return redirect()->route('superadmin.halls.index')->withSuccess(ucwords($hall->name." ".'info deleted successfully'));
        }
    }
}
