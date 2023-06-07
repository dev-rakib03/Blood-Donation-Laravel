<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\myrequest;
use App\Models\notification;
use Auth;
use Session;

class myrequestController extends Controller
{
    public function index()
    {
    	$myrequest=myrequest::orderBy('myrequests.created_at', 'asc')
    				->join('users','myrequests.donor_id','users.id')
    				->where('myrequests.user_id',Auth::user()->id)
                    ->where('myrequests.status','!=','3')
    				->select('myrequests.*','users.name','users.email','users.phone','users.phonestatus')
    				->paginate(10);
    	return view('common.myrequest.myrequest',['myrequest'=>$myrequest]);
    }
    public function submit_request($donor_id,$blood_group,$needed_date)
    {
    	if ($donor_id==Auth::user()->id) {
    		Session::put('danger','Blood request sending failed!');
    	}
    	else{

            //blood request
	    	$data['user_id']=Auth::user()->id;
	    	$data['donor_id']=$donor_id;
	    	$data['blood_group']=$blood_group;
	    	$data['needed_date']=$needed_date;
	    	myrequest::insert($data);

            //blood request notification  
            $data_notify['user_id']=$donor_id;
            $data_notify['notification_text']='You have new blood request.';
            $data_notify['link']=env('APP_URL').'/my-request';
            notification::insert($data_notify);

            //blood request automatic massage-----------------------------------------
                #sms sending code
            //end sms--------------           

            //return
            Session::put('success','Blood request sent successfully!');
	    	return redirect('/my-request');	
    	}
    	
    }
    public function delete_request($id)
    {
    	myrequest::where('id',$id)->delete();
    	Session::put('success','Blood request deleted successfully!');
    	return back();
    }
}
