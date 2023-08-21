<?php

namespace App\Http\Controllers\User;

use App\Models\MyContact;
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
        MyContact::create($contact);

        return redirect()->route('contact.us')->withSuccess('Thank you for contacting us. We will get back to you soon');
    }

    public function aboutUs()
    {
    	return view('user.pages.about');
    }
}
