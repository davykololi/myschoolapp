<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\User;
use App\Models\Accountant;
use App\Services\UserService;
use App\Services\AccountantService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Enums\AccountantPositionEnum;
use App\Enums\Concerns\GetsAttributes;
use App\Http\Requests\CommonUserFormRequest as StoreRequest;
use App\Http\Requests\CommonUserFormRequest as UpdateRequest;

class AccountantController extends Controller
{
    use ImageUploadTrait, GetsAttributes;
    protected $userService;
    protected $accountantService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService, AccountantService $accountantService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->userService = $userService;
        $this->accountantService = $accountantService;
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
                $accountants = Accountant::whereLike(['user.first_name', 'user.middle_name', 'user.last_name', 'user.email', 'phone_no','emp_no','position', 'id_no', 'designation'], $search)->eagerLoaded()->paginate(15);

                return view('superadmin.accountants.index',compact('accountants'));
            } else {
                $accountants = $this->accountantService->all();

                return view('superadmin.accountants.index',compact('accountants'));
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
        $positions = AccountantPositionEnum::cases();
        return view('superadmin.accountants.create',compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    { 
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

        $user->accountant()->create([
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

        $user->assignRole('accountant');

        return redirect()->route('superadmin.accountants.index')->withSuccess(ucwords($user->full_name." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $accountant = Accountant::findOrFail($id);

        return view('superadmin.accountants.show',compact('accountant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $accountant = Accountant::findOrFail($id);
        $positions = AccountantPositionEnum::cases();

        return view('superadmin.accountants.edit',compact('accountant','positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $accountant = Accountant::findOrFail($id);
        if($accountant){
            Storage::delete('public/storage/'.$accountant->image);
            $accountant->user()->update([
                'salutation' => $request->salutation,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'school_id' => Auth::user()->school->id,
            ]);

            $accountant->update([
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

            return redirect()->route('superadmin.accountants.index')->withSuccess(ucwords($accountant->user->full_name." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $accountant = Accountant::findOrFail($id);
        if($accountant){
            Storage::delete('public/storage/'.$accountant->image);
            $user = User::findOrFail($accountant->user_id);
            $user->accountant()->delete();
            $user->delete();
            $user->removeRole('accountant');

            return redirect()->route('superadmin.accountants.index')->withSuccess(ucwords($user->full_name." ".'info deleted successfully'));
        }
    }
}
