<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FieldService;
use App\Services\FieldCatService;
use Illuminate\Http\Request;
use App\Http\Requests\FieldFormRequest as StoreRequest;
use App\Http\Requests\FieldFormRequest as UpdateRequest;

class FieldController extends Controller
{
    protected $fieldService,$fieldCatService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FieldService $fieldService,FieldCatService $fieldCatService)
    {
        $this->middleware('auth:admin');
        $this->fieldService = $fieldService;
        $this->fieldCatService = $fieldCatService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fields = $this->fieldService->all();

        return view('admin.fields.index',compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoryFields = $this->fieldCatService->all();

        return view('admin.fields.create',compact('categoryFields'));
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
        $field = $this->fieldService->create($request);

        return redirect()->route('admin.fields.index')->withSuccess(ucwords($field->name." ".'created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $field = $this->fieldService->getId($id);

        return view('admin.fields.show',compact('field'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $field = $this->fieldService->getId($id);
        $categoryFields = $this->fieldCatService->all();

        return view('admin.fields.edit',compact('field','categoryFields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $field = $this->fieldService->getId($id);
        if($field){
            $this->fieldService->update($request,$id);

            return redirect()->route('admin.fields.index')->withSuccess(ucwords($field->name." ".'updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $field = $this->fieldService->getId($id);
        if($field){
            $this->fieldService->delete($id);

            return redirect()->route('admin.fields.index')->withSuccess(ucwords($field->name." ".'deleted successfully'));
        }
    }
}
