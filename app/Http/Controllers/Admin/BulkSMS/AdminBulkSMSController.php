<?php

namespace App\Http\Controllers\Admin\BulkSMS;

use Auth;
use RoyceBulkSMS;
use App\Services\TeacherService;
use App\Services\ParentService;
use App\Services\LibrarianService;
use App\Services\SubordinateService;
use App\Services\MatronService;
use App\Services\AdminService;
use App\Services\AccountantService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBulkSMSController extends Controller
{
    protected $teacherService, $parentService, $librarianService, $subordinateService, $matronService, $adminService, $accountantService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TeacherService $teacherService, ParentService $parentService, LibrarianService $librarianService, SubordinateService $subordinateService, MatronService $matronService, AdminService $adminService, AccountantService $accountantService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->teacherService = $teacherService;
        $this->parentService = $parentService;
        $this->librarianService = $librarianService;
        $this->subordinateService = $subordinateService;
        $this->matronService = $matronService;
        $this->adminService = $adminService;
        $this->accountantService = $accountantService;
    }

    public function bulkSmsForm()
    {
        $teachers = $this->teacherService->all();
        $parents = $this->parentService->all();
        $librarians = $this->librarianService->all();
        $subordinates = $this->subordinateService->all();
        $matrons = $this->matronService->all();
        $admins = $this->adminService->all();
        $accountants = $this->accountantService->all();

        return view('admin.bulksms.bulk_sms',compact('teachers','parents','librarians','subordinates','matrons','admins','accountants'));
    }

    public function sendBulkSms(Request $request)
    {
        $ownPhoneNumber = [Auth::user()->admin->phone_no];
        $teachersPhoneNumbers = $request->teachers_phone_numbers;
        $parentsPhoneNumbers = $request->parents_phone_numbers;
        $librariansPhoneNumbers = $request->librarians_phone_numbers;
        $subordinatesPhoneNumbers = $request->subordinates_phone_numbers;
        $matronsPhoneNumbers = $request->matrons_phone_numbers;
        $adminsPhoneNumbers = $request->admins_phone_numbers;
        $accountantsPhoneNumbers = $request->accountants_phone_numbers;

        $allPhoneNumbers = dd(array_merge([$ownPhoneNumber,$teachersPhoneNumbers,$parentsPhoneNumbers,$librariansPhoneNumbers,$subordinatesPhoneNumbers,$matronsPhoneNumbers,$adminsPhoneNumbers,$accountantsPhoneNumbers]));

        $message = $request->message;
        
        RoyceBulkSMS::sendSMS($allPhoneNumbers,$message );

        return back()->withSuccess('The message sent successfully');
    }
}
