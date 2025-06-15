<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\MyParent;
use App\Services\ParentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    protected $parentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ParentService $parentService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->parentService = $parentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function parents(Request $request)
    {
        //
        $user = Auth::user();
        if($user->hasRole('superadmin')){
            $search = strtolower($request->search);
            if($search){
                $parents = MyParent::whereLike(['user.first_name', 'user.middle_name', 'user.last_name', 'user.email', 'phone_no','id_no','current_address','permanent_address'], $search)->eagerLoaded()->paginate(15);

                return view('superadmin.parents.parents',compact('parents'));
            } else {
                $parents = $this->parentService->all();

                return view('superadmin.parents.parents',compact('parents'));
            }
        }
    }
}
