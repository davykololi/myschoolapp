<?php

namespace App\Http\Controllers\Admin;

use App\Services\GalleryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Gallery\StoreFormRequest as StoreRequest;
use App\Http\Requests\Gallery\UpdateFormRequest as UpdateRequest;

class GalleryController extends Controller
{
    protected $galleryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GalleryService $galleryService)
    {
        $this->middleware('auth:admin');
        $this->middleware('admin2fa');
        $this->galleryService = $galleryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galleries = $this->galleryService->all();

        return view('admin.galleries.index',['galleries'=>$galleries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.galleries.create');
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
        $gallery = $this->galleryService->create($request);

        return redirect()->route('admin.galleries.index')->withSuccess(ucwords($gallery->title." ".'created successfully'));
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
        $gallery = $this->galleryService->getId($id);

        return view('admin.galleries.show',compact('gallery'));
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
        $gallery = $this->galleryService->getId($id);

        return view('admin.galleries.edit',compact('gallery'));
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
        $gallery = $this->galleryService->getId($id);
        if($gallery){
            Storage::delete('public/storage/'.$gallery->image);
            $this->galleryService->update($request,$id);

            return redirect()->route('admin.galleries.index')->withSuccess(ucwords($gallery->title." ".'updated successfully'));
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
        $gallery = $this->galleryService->getId($id);
        if($gallery){
            Storage::delete('public/storage/'.$gallery->image);
            $this->galleryService->delete($id);

            return redirect()->route('admin.galleries.index')->withSuccess(ucwords($gallery->title." ".'deleted successfully'));
        }
    }
}
