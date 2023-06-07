<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\citis;
use App\Models\user_info;
use Illuminate\Support\Facades\Hash;
use Session;
class usersController extends Controller
{
    public function index()
    {
    	$users=User::where('role_id',3)->get();
    	return view('admin.users.show',['users'=>$users]);
    }

    public function user_profile($id)
    {
    	$users=User::where('users.id',$id)
    			->join('user_infos','users.id','user_infos.user_id')
    			->join('citis','user_infos.city_id','citis.id')
    			->select('users.*','user_infos.current_address','user_infos.blood_group','user_infos.gender','user_infos.dob','user_infos.city_id','citis.city')
    			->first();
    	$cities=citis::orderBy('city')->get(); 

    	return view('admin.users.profile',['users'=>$users,'cities'=>$cities]);
    }
    public function add_user()
    {
    	
    	$cities=citis::orderBy('city')->get(); 

    	return view('admin.users.add_user',['cities'=>$cities]);
    }

    public function save_add_user_profile(Request $request)
    {
    	$validated = $request->validate([
	        'email' => 'required|unique:users',
	        'phone' => 'required|unique:users',
	    ]);

    	//userdata--------------
    	$data_user['role_id']=$request->role_id;
    	$data_user['name']=$request->name;
    	$data_user['email']=$request->email;
    	$data_user['phone']=$request->phone;
    	$data_user['password']=Hash::make($request->password);
    	$data_user['created_at']=date('Y-m-d h:i:s');
        //userinfo data--------------
    	$data_user_info['current_address']=$request->current_address;
    	$data_user_info['city_id']=$request->city_id;

    	if ($request->role_id==2) {
    		$data_user_info['blood_group']='NA';
	        $data_user_info['gender']='NA';
	        $data_user_info['dob']=date('Y-m-d');
    	}
    	else{
    		$validated = $request->validate([
		        'blood_group' => 'required',
		        'gender' => 'required',
		        'dob' => 'required',
	    	]);
    		$data_user_info['blood_group']=$request->blood_group;
	        $data_user_info['gender']=$request->gender;
	        $data_user_info['dob']=$request->dob;
    	}
	    	

        $id=User::insertGetId($data_user);
        $data_user_info['user_id']=$id;
        user_info::insert($data_user_info);
        Session::put('success','User added successfully!');

        //SEND SMS ON PHONE WITH PASSWORD
        	#SMS SENDING CODE
        //END SMS--------------
    	
    	return redirect('/admin/dashboard');
    }
    public function edit_save_user_profile(Request $request)
    {
    	$validated = $request->validate([
	        'email' => 'required|unique:users',
	        'phone' => 'required|unique:users',
	    ]);
    	//userdata--------------
    	$data_user['role_id']=$request->role_id;
    	$data_user['name']=$request->name;
    	$data_user['email']=$request->email;
    	$data_user['phone']=$request->phone;
        //userinfo data--------------
    	$data_user_info['current_address']=$request->current_address;
    	$data_user_info['city_id']=$request->city_id;
    	$data_user_info['blood_group']=$request->blood_group;
        $data_user_info['gender']=$request->gender;
        $data_user_info['dob']=$request->dob;

        User::where('id',$request->user_id)->update($data_user);
        user_info::where('user_id',$request->user_id)->update($data_user_info);
        Session::put('success','Profile update successfully!');
    	
    	return back();
    }
}
