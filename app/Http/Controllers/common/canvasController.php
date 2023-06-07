<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\myrequest;
use Auth;
class canvasController extends Controller
{
    public function show_dashboard()
    {
    	$pending_req=myrequest::where('donor_id',Auth::user()->id)->where('status','2')->get();
		$pending_prove=myrequest::where('donor_id',Auth::user()->id)->where('status','1')->get();
		$total_donated=myrequest::where('donor_id',Auth::user()->id)->where('status','3')->get();
    	return view('common.canvas.dashboard',['pending_req'=>$pending_req,'pending_prove'=>$pending_prove,'total_donated'=>$total_donated]);
    }
}
