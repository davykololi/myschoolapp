<?php

namespace App\Http\Controllers\Admin;

use App\Services\DormitoryService as DormService;
use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DormFormRequest as StoreRequest;
use App\Http\Requests\DormFormRequest as UpdateRequest;

class DormitoryController extends Controller
{
    protected $dormService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DormService $dormService)
    {
        $this->middleware('auth:admin');
        $this->dormService = $dormService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dormitories = $this->dormService->all();

        return view('admin.dormitories.index',compact('dormitories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.dormitories.create');
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
        $dormitory = $this->dormService->create($request);

        return redirect()->route('admin.dormitories.index')->withSuccess(ucwords($dormitory->name." ".'info created successfully'));
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
        $dormitory = $this->dormService->getId($id);
        $meetings = Meeting::all();
        $dormitoryMeetings = $dormitory->meetings;

        return view('admin.dormitories.show',compact('dormitory','meetings','dormitoryMeetings'));
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
        $dormitory = $this->dormService->getId($id);

        return view('admin.dormitories.edit',compact('dormitory'));
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
        $dormitory = $this->dormService->getId($id);
        if($dormitory && !$dormitory->isDirty()){
            $this->dormService->update($request,$id);

            return redirect()->route('admin.dormitories.index')->withSuccess(ucwords($dormitory->name." ".'info updated successfully'));
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
        $dormitory = $this->dormService->getId($id);
        if($dormitory){
            $this->dormService->delete($id);

            return redirect()->route('admin.dormitories.index')->withSuccess(ucwords($dormitory->name." ".'info deleted successfully'));
        }
    }
}
