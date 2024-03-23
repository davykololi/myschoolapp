<?php

namespace App\Http\Controllers\Superadmin;

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
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
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

        return view('superadmin.libraries.index',['libraries'=>$libraries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superadmin.libraries.create');
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

        return redirect()->route('superadmin.libraries.index')->withSuccess(ucwords($library->name." ".'info created successfully'));
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

        return view('superadmin.libraries.show',compact('library','meetings','libraryMeetings'));
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

        return view('superadmin.libraries.edit',compact('library'));
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

            return redirect()->route('superadmin.libraries.index')->withSuccess(ucwords($library->name." ".'info updated successfully'));
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

            return redirect()->route('superadmin.libraries.index')->withSuccess(ucwords($library->name." ".'info deleted successfully'));
        }
    }
}
