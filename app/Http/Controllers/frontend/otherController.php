<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class otherController extends Controller
{
    public function terms_conditions()
    {
    	return view('frontend.other.terms_conditions');
    }
    public function privacy_policy()
    {
    	return view('frontend.other.privacy_policy');
    }
    public function how_to_find_donner()
    {
    	return view('frontend.other.how_to_find_donner');
    }
}
