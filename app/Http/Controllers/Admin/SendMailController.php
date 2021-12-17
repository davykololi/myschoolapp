<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\ParentsSendEmailJob;

class SendMailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function mailForm()
    {
    	return view('admin.mails.mailform');
    }

    public function sendMail(Request $request)
    {
    	$details = [
    			'subject' => 'Test Notification'
    		];
    	$job = (new ParentsSendEmailJob($details))->delay(now()->addSeconds(2));

    	dispatch($job);

    	return back()->withSuccess('The mail sent successfully');
    }
}
