<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use App\Services\ImageGalleryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Gallery\StoreFormRequest as StoreRequest;
use App\Http\Requests\Gallery\UpdateFormRequest as UpdateRequest;

class ImageGalleryController extends Controller
{
    protected $imageGalleryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ImageGalleryService $imageGalleryService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->imageGalleryService = $imageGalleryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $imageGalleries = $this->imageGalleryService->latestImageGallery();

        return view('admin.image-galleries.index',['imageGalleries'=>$imageGalleries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sections = Section::all();

        return view('admin.image-galleries.create',compact('sections'));
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
        $imageGallery = $this->imageGalleryService->create($request);

        return redirect()->route('admin.image-galleries.index')->withSuccess(ucwords($imageGallery->title." ".'created successfully'));
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
        $imageGallery = $this->imageGalleryService->getId($id);

        return view('admin.image-galleries.show',compact('imageGallery'));
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
        $imageGallery = $this->imageGalleryService->getId($id);
        $sections = Section::all();

        return view('admin.image-galleries.edit',compact('imageGallery','sections'));
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
        $imageGallery = $this->imageGalleryService->getId($id);
        if($imageGallery){
            Storage::delete('public/storage/'.$imageGallery->image);
            $this->imageGalleryService->update($request,$id);

            return redirect()->route('admin.image-galleries.index')->withSuccess(ucwords($imageGallery->title." ".'updated successfully'));
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
        $imageGallery = $this->imageGalleryService->getId($id);
        if($imageGallery){
            Storage::delete('public/storage/'.$imageGallery->image);
            $this->imageGalleryService->delete($id);

            return redirect()->route('admin.image-galleries.index')->withSuccess(ucwords($imageGallery->title." ".'deleted successfully'));
        }
    }
}
