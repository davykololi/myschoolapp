<?php

namespace App\Http\Controllers\Admin;

use App\Services\LibraryService as LibService;
use App\Models\Meeting;
use App\Models\Librarian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LibFormRequest as StoreRequest;
use App\Http\Requests\LibFormRequest as UpdateRequest;

class LibraryController extends Controller
{
    protected $libService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LibService $libService)
    {
        $this->middleware('auth:admin');
        $this->libService = $libService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libraries = $this->libService->all();

        return view('admin.libraries.index',['libraries'=>$libraries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.libraries.create');
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
        $library = $this->libService->create($request);

        return redirect()->route('admin.libraries.index')->withSuccess(ucwords($library->name." ".'info created successfully'));
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
        $library = $this->libService->getId($id);
        $meetings = Meeting::all();
        $libraryMeetings = $library->meetings;

        return view('admin.libraries.show',compact('library','meetings','libraryMeetings'));
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
        $library = $this->libService->getId($id);

        return view('admin.libraries.edit',compact('library'));
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
        $library = $this->libService->getId($id);
        if($library){
            $this->libService->update($request,$id);

            return redirect()->route('admin.libraries.index')->withSuccess(ucwords($library->name." ".'info updated successfully'));
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
        $library = $this->libService->getId($id);
        if($library){
            $this->libService->delete($id);

            return redirect()->route('admin.libraries.index')->withSuccess(ucwords($library->name." ".'info deleted successfully'));
        }
    }
}
