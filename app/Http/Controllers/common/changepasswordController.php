<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class changepasswordController extends Controller
{
    public function index()
    {
    	return view('common.passwordchange.password');
    }

    public function update(Request $request)
    {
    	echo Auth::user()->password."<br>";
    	if (Hash::check($request->old_password, Auth::user()->password)!=1) {
    		Session::put('danger','Current password not match!');
    		return back();
    	}
    	elseif ($request->new_password!=$request->re_password) {
    		Session::put('danger','Confirm password not match!');
    		return back();
    	}
    	elseif (strlen($request->new_password)<8) {
    		Session::put('danger','New password must be equal or greter than 8 digit!');
    		return back();
    	}
    	else{
    		$user=User::where('phone',Auth::user()->phone)->update(['password' => Hash::make($request->new_password)]);
    		Session::put('success','Password updated successfully!');
    		return redirect('/login');
    	}  	
    }
}
