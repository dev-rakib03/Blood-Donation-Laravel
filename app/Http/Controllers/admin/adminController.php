<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class adminController extends Controller
{
    public function index()
    {
    	$users=User::where('role_id',1)->get();
    	return view('admin.admin.show',['users'=>$users]);
    }
}
