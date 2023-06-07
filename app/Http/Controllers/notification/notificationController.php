<?php

namespace App\Http\Controllers\notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\notification;
use Auth;

class notificationController extends Controller
{
    public function show_noti()
    {
    	$noti_count=0;
    	$notif='';
    	$notifications=notification::orderBy('created_at', 'desc')
    					->where('user_id',Auth::user()->id)
    					->where('status',1)
    					->get();
    	$noti_count=count($notifications);

    	foreach ($notifications as $key => $not) {
    		if ($noti_count!=0) {
    			$notif.='<div class="dashboard_notifi_item" onClick="seen_notfy('.$not->id.')">
		                    <div class="bg-c1 green">
		                      <i class="fa fa-envelope"></i>
		                    </div>
		                    <div class="content">
		                      <p>'.$not->notification_text.'</p>
		                      <span class="date">'.strtotime($not->created_at).' hours ago</span>
		                    </div>
		                  </div>';
    		}	
    	}
    	if ($noti_count==0) {
			$notif.='<div class="content">
			<p>No notification available</p>
			</div>';
    	}
    	if ($noti_count>99) {
			$noti_count="99+";
    	}    	
    	$output=response()->json(['noti_count'=>$notif,'unnotify'=>$noti_count]);
    	return $output;
    }
    public function seen_noti(Request $request)
    {
    	notification::where('id',$request->notify_id)->update(['status'=>0]);
    	$l=notification::where('id',$request->notify_id)->select('notifications.link')->first();
    	$data=$l->link;
    	return $data;
    }
}
