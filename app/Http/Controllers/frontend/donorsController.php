<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_info;
use App\Models\citis;
use App\Models\myrequest;

class donorsController extends Controller
{
	public function show_all(Request $request)
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
    	->select('users.id','users.name','users.phone','users.phonestatus','users.profile_photo_path','user_infos.current_address','user_infos.blood_group','user_infos.gender','user_infos.dob','citis.city')
    	->paginate(15);

    	if ($request->ajax()) {
            $view = view('frontend.donors.donor',compact('users','proves'))->render();
            return response()->json(['html'=>$view]);
        }

    	return view('frontend.donors.all_donors',['users'=>$users,'citis'=>$citis,'proves'=>$proves]);
    }
    public function city_search(Request $request)
	{
		if($request->ajax())
		{
			$proves=myrequest::orderBy('proves.created_at', 'desc')
	    	->join('proves','myrequests.id','proves.request_id')
	    	->select('myrequests.donor_id','proves.donated_date')
	    	->get();

			$cityoutput="";
			$users=User::orderBy('users.created_at', 'desc')
	    	->join('user_infos','users.id','user_infos.user_id')
	    	->join('citis','user_infos.city_id','citis.id')
	    	->where('users.role_id',3)
	    	->where('user_infos.city_id',$request->city)
	    	->where('user_infos.blood_group',$request->blood_group)
	    	->select('users.id','users.name','users.phone','users.phonestatus','users.profile_photo_path','user_infos.current_address','user_infos.blood_group','user_infos.gender','user_infos.dob','citis.city')
	    	->paginate(15);

			if($users)
			{
				if (!count($users)) {
					$cityoutput ="<center><div style='background-color:rgb(0,0,0,.1); padding: 5px;'>No results found</div></center><br>";
				}
				else{
					$cityoutput = view('frontend.donors.donor',compact('users','proves'))->render();
				}
            	return response()->json(['cityoutput'=>$cityoutput]);
		    }
	    }
	}
}
