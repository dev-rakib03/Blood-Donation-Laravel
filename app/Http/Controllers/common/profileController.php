<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_info;
use App\Models\citis;
use Auth;
use Session;
use Intervention\Image\Facades\Image;

class profileController extends Controller
{
    public function index()
    {
        $citis=citis::all()->sortBy('city');
        $user_info=user_info::where('user_id',Auth::user()->id)->first();
    	return view('common.profile.profile',['user_info'=>$user_info,'citis'=>$citis]);
    }       

    public function update(Request $request)
    {
        //profile picture upload----------
        if ($request->file('profile_photo_path')) {
            $image = $request->file('profile_photo_path');
            echo $image->getSize();
            if ($image->getSize()<=525312) {
                $image_name = time() . '.' . $image->getClientOriginalExtension();

                if (Auth::user()->profile_photo_path!=null) {
                    if (file_exists(Auth::user()->profile_photo_path)) {
                        unlink(Auth::user()->profile_photo_path);
                    }
                }

                $destinationPath ='uploads/profile-photos';
                $image->move($destinationPath, $image_name);
                $profile_photo_path=$destinationPath.'/'.$image_name;
                $data_user['profile_photo_path']=$profile_photo_path;
            }
            else{
                Session::put('danger','Profile image must be lessthan 512KB!');
            }
        }

        //userdata--------------
    	$data_user['name']=$request->name;
    	$data_user['email']=$request->email;
    	$data_user['phone']=$request->phone;
    	$data_user['phonestatus']=$request->phonestatus;
        //userinfo data--------------
    	$data_user_info['current_address']=$request->current_address;
    	$data_user_info['city_id']=$request->city;
    	$data_user_info['blood_group']=$request->blood_group;
        $data_user_info['gender']=$request->gender;
        $data_user_info['dob']=$request->dob;

        User::where('id',Auth::user()->id)->update($data_user);
        user_info::where('user_id',Auth::user()->id)->update($data_user_info);
        Session::put('success','Profile update successfully!');
        return back();
    }
}
