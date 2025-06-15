<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\PaymentSection;
use App\Services\PaymentSectionService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperadminPaymentSectionController extends Controller
{
    protected $paymentSectionService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PaymentSectionService $paymentSectionService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->paymentSectionService = $paymentSectionService;
    }

    public function paymentSections(Request $request)
    {
        $user = Auth::user();
        $search = strtolower($request->search);
        if($user->hasRole('superadmin')){
            if($search){
                $paymentSections = PaymentSection::whereLike(['name', 'payment_amount', 'ref_no'], $search)->eagerLoaded()->paginate(15);

                return view('superadmin.paymentsections.payment_sections',compact('paymentSections'));
            } else {
                $paymentSections = $this->paymentSectionService->paginated();

                return view('superadmin.paymentsections.payment_sections',compact('paymentSections'));
            }
            
        }
        
    }
}
