<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class adminBloodBankController extends Controller
{
    public function index()
    {
    	$users=User::where('role_id',2)->get();
    	return view('admin.bloodbank.show',['users'=>$users]);
    }
}
