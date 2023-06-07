<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prove;
use App\Models\myrequest;
use Auth;
use Session;

class proveController extends Controller
{
    public function index()
    {
    	$proves=prove::orderBy('proves.created_at', 'desc')
				->join('myrequests','proves.request_id','myrequests.id')
				->join('users','myrequests.user_id','users.id')
				->where('myrequests.donor_id',Auth::user()->id)
				->where('proves.status',1)
				->select('proves.id','proves.donated_date','myrequests.blood_group','users.name','users.email','users.phone','users.phonestatus')
				->paginate(10);
    	return view('common.prove.prove',['proves'=>$proves]);
    }
    public function submit_prove_show($req_id)
    {
    	$request_id= base64_decode($req_id);
    	return view('common.prove.submitform',['request_id'=>$request_id]);
    }
    public function submitprove(Request $request)
    {
    	if (prove::where('request_id',$request->request_id)->first()) {
    		Session::put('danger','Prove alredy submitted!');
    		return redirect('/donated-list');
    	}
    	else{
    		$image_ok=0;
	    	//Prove Image upload----------
	        if ($request->file('prove_image')) {
	            $image = $request->file('prove_image');
	            echo $image->getSize();
	            if ($image->getSize()<=525312) {
	                $image_name = time() . '.' . $image->getClientOriginalExtension();

	                $destinationPath ='uploads/proves-photos';
	                $image->move($destinationPath, $image_name);
	                $prove_image=$destinationPath.'/'.$image_name;
	                $image_ok=1;
	            }
	            else{
	                Session::put('danger','Profile image must be lessthan 1MB!');
	            }
	        }

	        if ($image_ok==1) {
	        	$data['request_id']=$request->request_id;
		    	$data['prove_image']=$prove_image;
		    	$data['prove_comment']=$request->prove_comment;
		    	$data['donated_date']=$request->donated_date;
		    	prove::insert($data);
		    	myrequest::where('id',$request->request_id)->update(['status'=>3]);
		    	Session::put('success','Prove submit successfully! Wait for admin aprovel');
		    	return redirect('/donated-list');
	        }
	        else{
	        	Session::put('danger','Image uploaded failed!');
	        	return back();
	    	}
    	}
	    	
    }
}
