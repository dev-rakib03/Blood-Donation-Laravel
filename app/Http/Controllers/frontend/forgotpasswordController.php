<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class forgotpasswordController extends Controller
{
    public function numbercheck(Request $request)
    {
    	$user=User::where('phone',$request->verify_phone)->first();
    	$phone='';
    	if ($user) {
    		$phone=$user->phone;
    	}
    	else{
    		$phone='false';
    	}
    	return response()->json(['data'  => $phone]);
    }
    public function resetpass(Request $request)
    {
    	$user=User::where('phone',$request->phone_update)->update(['password' => Hash::make($request->password)]);
    	Session::put('success','Password updated successfully!');
    	return redirect('/login');
    }
}
