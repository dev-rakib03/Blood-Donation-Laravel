<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\myrequest;
use App\Models\prove;
use Auth;
use Session;

class dashboardController extends Controller
{
    public function index()
    {
    	$users=User::where('users.role_id',3)->get();
    	$BloodBank=User::where('users.role_id',2)->get();
    	$donated=prove::where('status',1)->get();
    	$p_P=prove::where('status',0)->get();
    	$donation_request=myrequest::where('status',2)->get();
    	return view('admin.dashboard.show_dashboard',['total_user'=>count($users), 'total_bloodbank'=> count($BloodBank),'total_donated'=>count($donated),'total_donation_request'=>count($donation_request),'pending_proves'=>count($p_P)]);
    }
}
