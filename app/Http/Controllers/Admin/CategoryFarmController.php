<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FarmCatService;
use Illuminate\Http\Request;
use App\Http\Requests\FarmCatFormRequest as StoreRequest;
use App\Http\Requests\FarmCatFormRequest as UpdateRequest;

class CategoryFarmController extends Controller
{
    protected $farmCatService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FarmCatService $farmCatService)
    {
        $this->middleware('auth:admin');
        $this->farmCatService = $farmCatService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoryFarms = $this->farmCatService->all();

        return view('admin.category-farms.index',compact('categoryFarms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category-farms.create');
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
        $categoryFarm = $this->farmCatService->create($request);

        return redirect()->route('admin.category-farms.index')->withSuccess(ucwords($categoryFarm->name." ".'category created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryFarm  $categoryFarm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categoryFarm = $this->farmCatService->getId($id);

        return view('admin.category-farms.show',compact('categoryFarm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryFarm  $categoryFarm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categoryFarm = $this->farmCatService->getId($id);

        return view('admin.category-farms.edit',compact('categoryFarm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryFarm  $categoryFarm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $categoryFarm = $this->farmCatService->getId($id);
        if($categoryFarm){
            $this->farmCatService->update($request,$id);

            return redirect()->route('admin.category-farms.index')->withSuccess(ucwords($categoryFarm->name." ".'category updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryFarm  $categoryFarm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categoryFarm = $this->farmCatService->getId($id);
        if($categoryFarm){
            $this->farmCatService->delete($id);

            return redirect()->route('admin.category-farms.index')->withSuccess(ucwords($categoryFarm->name." ".'category deleted successfully!'));
        }
    }
}
