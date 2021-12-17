<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\AdminService;
use App\Services\SchoolService;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminFormRequest as StoreRequest;
use App\Http\Requests\AdminFormRequest as UpdateRequest;

class AdminController extends Controller
{
    protected $adminService;
    protected $schoolService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminService $adminService,SchoolService $schoolService)
    {
        $this->middleware('auth:superadmin');
        $this->adminService = $adminService;
        $this->schoolService = $schoolService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = $this->adminService->all();

        return view('superadmin.admins.index',['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = $this->schoolService->all();

        return view('superadmin.admins.create',compact('schools'));
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
        $admin = $this->adminService->create($request);

        return redirect()->route('superadmin.admins.index')->withSuccess(ucwords($admin->name." ".'info created successfully'));
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
        $admin =$this->adminService->getId($id);

        return view('superadmin.admins.show',['admin' => $admin]);
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
        $admin =$this->adminService->getId($id);
        $schools = $this->schoolService->all();

        return view('superadmin.admins.edit',compact('admin','schools'));
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
        $admin =$this->adminService->getId($id);
        if($admin){
            Storage::delete('public/storage/'.$admin->image);
            $this->adminService->update($request,$id);

            return redirect()->route('superadmin.admins.index')->withSuccess(ucwords($admin->name." ".'info updated successfully'));
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
        $admin =$this->adminService->getId($id);
        if($admin){
            $this->authorize('delete',$admin);
            Storage::delete('public/storage/'.$admin->image);
            $this->adminService->delete($id);

            return redirect()->route('superadmin.admins.index')->withSuccess(ucwords($admin->name." ".'info deleted successfully'));
        }    
    }
}
