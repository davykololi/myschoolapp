<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\User;
use App\Models\Admin;
use App\Services\AdminService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\AdminPositionEnum;
use App\Http\Requests\CommonUserFormRequest as StoreRequest;
use App\Http\Requests\CommonUserFormRequest as UpdateRequest;

class AdminController extends Controller
{
    protected $adminService;
    use ImageUploadTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminService $adminService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->adminService = $adminService;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user = Auth::user();
        if($user->hasRole('superadmin')){
            $search = strtolower($request->search);
            if($search){
                $admins = Admin::whereLike(['user.first_name', 'user.middle_name', 'user.last_name', 'user.email', 'phone_no','emp_no','position', 'id_no', 'designation'], $search)->eagerLoaded()->paginate(15);

                return view('superadmin.admins.index',compact('admins'));
            } else {
                $admins = $this->adminService->all();

                return view('superadmin.admins.index',compact('admins'));
            } 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $positions = AdminPositionEnum::cases();
        return view('superadmin.admins.create',compact('positions'));
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
        $user = User::create([
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'school_id' => Auth::user()->school->id,
        ]);

        $user->admin()->create([
            'blood_group' => $request->blood_group,
            'image' => $this->verifyAndUpload($request,'image','public/storage/'),
            'gender' => $request->gender,
            'id_no' => $request->id_no,
            'emp_no' => $request->emp_no,
            'dob' => $request->dob,
            'designation' => $request->designation,
            'phone_no' => $request->phone_no,
            'history' => $request->history,
            'position' => $request->position,
            'school_id' => Auth::user()->school->id,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        $user->assignRole('admin');

        return redirect()->route('superadmin.admins.index')->withSuccess(ucwords($user->full_name." ".'info created successfully'));
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
        $admin = Admin::findOrFail($id);

        return view('superadmin.admins.show',compact('admin'));
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
        $admin = Admin::findOrFail($id);
        $positions = AdminPositionEnum::cases();

        return view('superadmin.admins.edit',compact('admin','positions'));
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
        $admin = Admin::findOrFail($id);
        if($admin){
            Storage::delete('public/storage/'.$admin->image);
            $admin->user()->update([
                'salutation' => $request->salutation,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'gender' => $request->gender,
                'school_id' => Auth::user()->school->id,
            ]);

            $admin->update([
                'blood_group' => $request->blood_group,
                'image' => $this->verifyAndUpload($request,'image','public/storage/'),
                'gender' => $request->gender,
                'id_no' => $request->id_no,
                'emp_no' => $request->emp_no,
                'dob' => $request->dob,
                'designation' => $request->designation,
                'phone_no' => $request->phone_no,
                'history' => $request->history,
                'position' => $request->position,
                'school_id' => Auth::user()->school->id,
                'current_address'   => $request->current_address,
                'permanent_address' => $request->permanent_address
            ]);

            return redirect()->route('superadmin.admins.index')->withSuccess(ucwords($admin->user->full_name." ".'info updated successfully'));
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
        $admin = Admin::findOrFail($id);
        if($admin){
            Storage::delete('public/storage/'.$admin->image);
            $user = User::findOrFail($admin->user_id);
            $user->admin()->delete();
            $user->delete();
            $user->removeRole('admin');

            return redirect()->route('superadmin.admins.index')->withSuccess(ucwords($user->full_name." ".'info deleted successfully'));
        }    
    }
}
