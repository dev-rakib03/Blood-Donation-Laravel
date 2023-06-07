<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Session;

class contactController extends Controller
{
    public function index()
    {
    	return view('frontend.contact.contact_us');
    }
    public function send_contact(Request $request)
    {
    	$name=$request->fname.' '.$request->lname;
    	$email=$request->email;
    	$subject=$request->subject;
    	$mail_body=$request->comments;
    	$details=[
    		'name'=>$name,
    		'email'=>$email,
    		'subject'=>$subject,
    		'mail_body'=>$mail_body
    	];

		$toMail='rakibuzzman72@gmail.com';
    	Mail::to($toMail)->send(new ContactMail($details));

    	Session::put('success','Your massage sent successfully');
    	return back();
    }
}
