<?php

namespace App\Http\Controllers\message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\message;
use Auth;
use DB;

class messageController extends Controller
{
    public function index()
    {
    	return view('messages.activelist');
    }

    public function show_activeuser()
    {
    	$outgoing_id=Auth::user()->id;
    	$query =User::orderBy('id', 'desc')
		    	->where('id','!=',$outgoing_id)
		    	->where('users.active_status','>',date("Y-m-d H:i:s"))
		    	->get();
    	$output = "";
    	if(count($query) == 0){
        	$output .= "<center>No users are available to chat</center>";
	    }
	    else{
	    	//if user available
	    	foreach ($query as $key => $user) {
	    		$seen=message::orderBy('msg_id', 'desc')
	    		->whereRaw("(incoming_msg_id = {$user->id} OR outgoing_msg_id = {$user->id}) AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id})")
	    		->where('seen',0)
		    	->select('messages.*')
	    		->get();
	    		$new_msg=count($seen);
	    		if ($new_msg==0) {
	    			$new_msg='';
	    		}
	    		elseif($new_msg>99) {
	    			$new_msg='<span class="un_seen_label">99+</span>';
	    		}
	    		else{
	    			$new_msg='<span class="un_seen_label">'.$new_msg.'</span>';
	    		}
	    		$msg="";
	    		$lastmassage=message::orderBy('msg_id', 'desc')
	    		->whereRaw("(incoming_msg_id = {$user->id} OR outgoing_msg_id = {$user->id}) AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id})")
		    	->select('messages.*')
	    		->take(1)
	    		->first();

	    		$msg=$lastmassage->msg;
	    		if ($msg) {
	    			$result = $msg;
	    			if (strlen($result) > 28) {
	    				$msg =  substr($result, 0, 28) . '...';
	    			}
	    			else{
	    				$msg = $result;
	    			}
	    		}
	    		else{
	    			$result ="No message available";
	    		}

	    		if(isset($lastmassage->outgoing_msg_id)){
		            ($outgoing_id == $lastmassage->outgoing_msg_id) ? $you = "You: " : $you = "";
		        }else{
		            $you = "";
		        }

	    		($user->active_status < date("Y-m-d H:i:s")) ? $offline = "offline" : $offline = "";
	    		if ($user->profile_photo_path) {
                    $profile_photo_path=env("APP_URL").'/'.$user->profile_photo_path;
                }else{
                    $profile_photo_path='https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=7F9CF5&background=EBF4FF';
                }
		        $output .= '<a href="/message/chatbox/'. $user->id .'">
		                    <div class="content">
			                    <img src="'. $profile_photo_path .'" alt="">
			                    '.$new_msg.'
			                    <div class="details">
			                        <span>'. $user->name .'</span>
			                        <p>'.$you . $msg .'</p>
			                    </div>
		                    </div>
		                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
		                	</a>';

	    	}
	    }
	    return $output;    	
    }

    public function show_search_chat_user(Request $request)
    {
	    $outgoing_id=Auth::user()->id;
	    $searchTerm = $request->searchTerm;
    	$query =User::orderBy('name', 'asc')
				->where('users.id','!=',Auth::user()->id)
			   	->where('users.name', 'like', "%{$searchTerm}%") 
			   	->orWhere('users.email', 'like', "%{$searchTerm}%")
			   	->select('users.*') 
			   	->get();
    	$output = "";
    	if(count($query) == 0){
        	$output .= "No users are available to chat";
	    }
	    else{
	    	//if user available
	    	foreach ($query as $key => $user) {
	    		$msg="";
	    		$lastmassage=message::orderBy('msg_id', 'desc')
	    		->whereRaw("(incoming_msg_id = {$user->id} OR outgoing_msg_id = {$user->id}) AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id})")
		    	->select('messages.*')
	    		->take(1)
	    		->first();

	    		$msg=$lastmassage->msg;
	    		if ($msg) {
	    			$result = $msg;
	    			if (strlen($result) > 28) {
	    				$msg =  substr($result, 0, 28) . '...';
	    			}
	    			else{
	    				$msg = $result;
	    			}
	    		}
	    		else{
	    			$result ="No message available";
	    		}

	    		if(isset($lastmassage->outgoing_msg_id)){
		            ($outgoing_id == $lastmassage->outgoing_msg_id) ? $you = "You: " : $you = "";
		        }else{
		            $you = "";
		        }

	    		($user->active_status < date("Y-m-d H:i:s")) ? $offline = "offline" : $offline = "";
	    		if ($user->profile_photo_path) {
                    $profile_photo_path=env("APP_URL").'/'.$user->profile_photo_path;
                }else{
                    $profile_photo_path='https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=7F9CF5&background=EBF4FF';
                }

		        $output .= '<a href="/message/chatbox/'. $user->id .'">
		                    <div class="content">
		                    <img src="'. $profile_photo_path .'" alt="">
		                    <div class="details">
		                        <span>'. $user->name .'</span>
		                        <p>'. $you . $msg .'</p>
		                    </div>
		                    </div>
		                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
		                </a>';

	    	}
	        
	    }
	    return $output;
    }

    //chatbox--------------------------------------------------------
    public function show_user_chatbox($user_id)
    {
    	$chat_user=User::where('users.id',$user_id)->first();
    	return view('messages.chatbox')->with('chat_user',$chat_user);
    }
	
	public function show_user_chatbox_insert_chat(Request $request)
	{
        $data['outgoing_msg_id']= Auth::user()->id;
        $data['incoming_msg_id']= $request->incoming_id;
        $data['msg']= $request->message;
        if($request->message){
        	message::insert($data);
        }
	}

	public function show_user_chatbox_get_chat(Request $request)
	{
	        $outgoing_id = Auth::user()->id;
	        $incoming_id = $request->incoming_id;
	        $output = "";

	        $query_m = message::join('users','messages.outgoing_msg_id','users.id')
	        ->whereRaw("(outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
	                        OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id})")
	        ->orderBy('msg_id')
			->get();

	        if(count($query_m) > 0){
	        	foreach ($query_m as $key => $user_msg) {
	        		message::where('outgoing_msg_id',$incoming_id)->where('incoming_msg_id',$outgoing_id)->update(['seen'=>1]);	        		
	        		if($user_msg->seen==0) {
	        			$seen_status="sent";
	        		}
	        		else{
	        			$seen_status="seen";
	        		}

	        		if($user_msg->outgoing_msg_id === $outgoing_id){
	                    $output .= '<div style="text-align:right;">
	                    			<div class="chat outgoing">
	                                <div class="details">
	                                    <p style="margin-bottom: 0px;">'.$user_msg->msg.'</p>
	                                </div>	                               
	                                </div>
	                                <p class="msg_time" style="margin-top: 3px; margin-bottom: 0px; line-height: 11px;">'.$user_msg->created_at.'</p>
	                                <p class="msg_time"  style="line-height: 10px;" >'.$seen_status.'</p>
	                                </div>';
	                }else{
	                	if ($user_msg->profile_photo_path) {
		                    $profile_photo_path=env("APP_URL").'/'.$user_msg->profile_photo_path;
		                }else{
		                    $profile_photo_path='https://ui-avatars.com/api/?name='.urlencode($user_msg->name).'&color=7F9CF5&background=EBF4FF';
		                }
	                    $output .= '<div style="text-align:left;">
	                    			<div class="chat incoming">
	                                <img class="img_profile" src="'.$profile_photo_path.'" alt="">
	                                
	                                <div class="details">
	                                    <p style="margin-bottom: 0px;">'.$user_msg->msg.'</p>
	                                </div>
	                                </div>	                              
	                                <p class="msg_time" style="position:relative; left:45px; margin-top: 3px; margin-bottom: 0px; line-height: 11px;">'.$user_msg->created_at.'</p>
	                                <p class="msg_time"  style="position:relative; left:45px; line-height: 10px;" >'.$seen_status.'</p>
	                                </div>';
	                }
	        	}
	        }else{
	            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
	        }	        
	        return $output;
	}

	public function make_online()
	{
		$active_time=date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +5 minutes"));
		user::where('id',Auth::user()->id)->update(['active_status'=>$active_time]);
	}
}
