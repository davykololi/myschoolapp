<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FieldCatService as FldCatService;
use Illuminate\Http\Request;
use App\Http\Requests\FieldCatFormRequest as StoreRequest;
use App\Http\Requests\FieldCatFormRequest as UpdateRequest;

class CategoryFieldController extends Controller
{
    protected $fldCatService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FldCatService $fldCatService)
    {
        $this->middleware('auth:admin');
        $this->fldCatService = $fldCatService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categoryFields = $this->fldCatService->all();

        return view('admin.category-fields.index',compact('categoryFields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category-fields.create');
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
        $categoryField = $this->fldCatService->create($request);

        return redirect()->route('admin.category-fields.index')->withSuccess(ucwords($categoryField->name." ".'category created successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryField  $categoryField
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $categoryField = $this->fldCatService->getId($id);

        return view('admin.category-fields.show',compact('categoryField'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryField  $categoryField
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categoryField = $this->fldCatService->getId($id);

        return view('admin.category-fields.edit',compact('categoryField'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryField  $categoryField
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $categoryField = $this->fldCatService->getId($id);
        if($categoryField){
            $this->fldCatService->update($request,$id);

            return redirect()->route('admin.category-fields.index')->withSuccess(ucwords($categoryField->name." ".'category updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryField  $categoryField
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $categoryField = $this->fldCatService->getId($id);
        if($categoryField){
            $this->fldCatService->delete($id);

            return redirect()->route('admin.category-fields.index')->withSuccess(ucwords($categoryField->name." ".'category deleted successfully!'));
        }
    }
}
