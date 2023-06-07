<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\myrequest;
use Auth;
use Session;

class bloodrequestController extends Controller
{
    public function index()
    {
    	$myrequest=myrequest::orderBy('myrequests.created_at', 'asc')
    				->join('users','myrequests.user_id','users.id')
    				->where('myrequests.donor_id',Auth::user()->id)
                    ->where('myrequests.status','!=','3')
    				->select('myrequests.*','users.name','users.email','users.phone','users.phonestatus')
    				->paginate(10);
    	return view('common.bloodrequest.bloodrequest',['myrequest'=>$myrequest]);
    }
    public function cancle_request($id)
    {
    	myrequest::where('id',$id)->update(['status'=>0]);
    	Session::put('success','Blood request cancled successfully!');
    	return back();
    }
    public function accpet_request($id)
    {
    	myrequest::where('id',$id)->update(['status'=>1]);
    	Session::put('success','Blood request accpeted successfully!');
    	return back();
    }
}
