<?php

namespace App\Http\Controllers\User;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function contactForm()
    {
    	return view('user.pages.contact');
    }

    public function contactSave(Request $request)
    {
    	$contact = $request->all();
        Contact::create($contact);

        return redirect()->route('contact.us')->withSuccess('Thank you for contacting us. We will get back to you soon');
    }
}
