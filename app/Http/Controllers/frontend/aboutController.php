<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    public function about_us()
    {
    	return view('frontend.about.about_us');
    }
    public function massage_of_founder()
    {
    	return view('frontend.about.massage_of_founder');
    }
    public function our_partners()
    {
    	return view('frontend.about.our_partners');
    }
}
