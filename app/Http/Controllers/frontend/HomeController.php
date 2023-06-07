<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_info;
use App\Models\citis;
use App\Models\myrequest;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $proves=myrequest::orderBy('proves.created_at', 'desc')
        ->join('proves','myrequests.id','proves.request_id')
        ->select('myrequests.donor_id','proves.donated_date')
        ->get();

    	$citis=citis::all()->sortBy('city');
    	$users=User::orderBy('users.created_at', 'desc')
    	->join('user_infos','users.id','user_infos.user_id')
    	->join('citis','user_infos.city_id','citis.id')
    	->where('users.role_id',3)
    	->select('users.id','users.name','users.phone','users.phonestatus','users.profile_photo_path','user_infos.current_address','user_infos.blood_group','user_infos.gender','citis.city')
    	->paginate(15);

    	if ($request->ajax()) {
            $view = view('frontend.donors.donor',compact('users'))->render();
            return response()->json(['html'=>$view]);
        }
    	return view('frontend.home',['users'=>$users,'citis'=>$citis,'proves'=>$proves]);
    }
}
