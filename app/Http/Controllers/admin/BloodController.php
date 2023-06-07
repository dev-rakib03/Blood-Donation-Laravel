<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\myrequest;
use App\Models\prove;
use App\Models\notification;
use Session;

class BloodController extends Controller
{
    public function donationprovesshow()
    {	
    	$proves=prove::where('proves.status',0)
    			->join('myrequests','proves.request_id','myrequests.id')
    			->select('myrequests.user_id as recevier_id','myrequests.donor_id','proves.*')
    			->get();
    	$users=User::all();
    	return view('admin.blood.donationprovesshow',['proves'=>$proves,'users'=>$users]);
    }
    public function donationprovesshow_single($id)
    {
    	$proves=prove::where('proves.id',$id)
    			->join('myrequests','proves.request_id','myrequests.id')
    			->select('myrequests.user_id as recevier_id','myrequests.donor_id','proves.*')
    			->first();
    	$users=User::all();
    	return view('admin.blood.donationprovesshow_single',['proves'=>$proves,'users'=>$users]);
    }

    public function donation_prove_accpet($id,$donor_id)
    {
        prove::where('id',$id)->update(['status'=>1]);
        Session::put('success','Donation prove accpeted.');
        //notification
        notification::insert(['user_id'=>$donor_id,'notification_text'=>'Your donation prove has accpeted.','link'=>env('APP_URL').'/donated-list']);
        return redirect('/admin/donation-proves');
    }

    public function donation_prove_reject($id,$donor_id)
    {
        $prove=prove::where('id',$id)->first();
        unlink($prove->prove_image);
        myrequest::where('id',$prove->request_id)->update(['status'=>1]);
        prove::where('id',$id)->delete();
        Session::put('success','Donation prove Rejected.');
        //notification
        notification::insert(['user_id'=>$donor_id,'notification_text'=>'Your donation prove has rejected.Submit prove again.','link'=>env('APP_URL').'/blood-request']);
        return redirect('/admin/donation-proves');
    }
}
