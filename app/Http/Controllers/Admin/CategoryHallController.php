<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\HallCatService;
use Illuminate\Http\Request;
use App\Http\Requests\HallCatFormRequest as StoreRequest;
use App\Http\Requests\HallCatFormRequest as UpdateRequest;

class CategoryHallController extends Controller
{
    protected $hallCatService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HallCatService $hallCatService)
    {
        $this->middleware('auth:admin');
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
        $categoryHalls = $this->hallCatService->all();

        return view('admin.category-halls.index',compact('categoryHalls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category-halls.create');
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
        $categoryHall = $this->hallCatService->create($request);

        return redirect()->route('admin.category-halls.index')->withSuccess(ucwords($categoryHall->name." ".'category created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryHall  $categoryHall
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categoryHall = $this->hallCatService->getId($id);

        return view('admin.category-halls.show',compact('categoryHall'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryHall  $categoryHall
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categoryHall = $this->hallCatService->getId($id);

        return view('admin.category-halls.edit',compact('categoryHall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryHall  $categoryHall
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $categoryHall = $this->hallCatService->getId($id);
        if($categoryHall){
            $this->hallCatService->update($request,$id);

            return redirect()->route('admin.category-halls.index')->withSuccess(ucwords($categoryHall->name." ".'category updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryHall  $categoryHall
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categoryHall = $this->hallCatService->getId($id);
        if($categoryHall){
            $this->hallCatService->delete($id);

            return redirect()->route('admin.category-halls.index')->withSuccess(ucwords($categoryHall->name." ".'category deleted successfully!'));
        }
    }
}
