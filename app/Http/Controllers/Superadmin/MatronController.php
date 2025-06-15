<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\User;
use App\Models\Matron;
use App\Http\Controllers\Controller;
use App\Services\MatronService as MatService;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Enums\MatronPositionEnum;
use App\Http\Requests\CommonUserFormRequest as StoreRequest;
use App\Http\Requests\CommonUserFormRequest as UpdateRequest;

class MatronController extends Controller
{
    use ImageUploadTrait;
    protected $matronService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MatService $matronService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->matronService = $matronService;
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
                $matrons = Matron::whereLike(['user.first_name', 'user.middle_name', 'user.last_name', 'user.email', 'phone_no','emp_no','position', 'id_no', 'designation'], $search)->eagerLoaded()->paginate(15);

                return view('superadmin.matrons.index',compact('matrons'));
            } else {
                $matrons = $this->matronService->all();

                return view('superadmin.matrons.index',compact('matrons'));
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
        $positions = MatronPositionEnum::cases();
        return view('superadmin.matrons.create',compact('positions'));
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
            'password' => Hash::make($request->password),
            'school_id' => Auth::user()->school->id,
        ]);

        $user->matron()->create([
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

        $user->assignRole('matron');

        return redirect()->route('superadmin.matrons.index')->withSuccess(ucwords($user->full_name." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matron  $matron
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $matron = $this->matService->getId($id);

        return view('superadmin.matrons.show',compact('matron'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matron  $matron
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $matron = $this->matService->getId($id);
        $positions = MatronPositionEnum::cases();

        return view('superadmin.matrons.edit',compact('matron','positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matron  $matron
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $matron = $this->matService->getId($id);
        if($matron){
            Storage::delete('public/storage/'.$matron->image);
            $matron->user()->update([
                'salutation' => $request->salutation,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'school_id' => Auth::user()->school->id,
            ]);

            $matron->update([
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

            return redirect()->route('superadmin.matrons.index')->withSuccess(ucwords($matron->user->full_name." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matron  $matron
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $matron = $this->matService->getId($id);
        if($matron){
            Storage::delete('public/storage/'.$matron->image);
            $user = User::findOrFail($matron->user_id);
            $user->matron()->delete();
            $user->delete();
            $user->removeRole('matron');

            return redirect()->route('superadmin.matrons.index')->withSuccess(ucwords($user->full_name." ".'info deleted successfully'));
        }    
    }
}
