@extends('layouts.common.layout')
@section('title', 'Edit Profile')
@section('content')
<div id="titlebar" class="dashboard_gradient">
<div class="row">
  <div class="col-md-12">
    <h2>My Profile</h2>
    <nav id="breadcrumbs">
      <ul>
        <li><a href="{{asset('/')}}">Home</a></li>
        <li><a href="{{asset('/')}}dashboard">Canvas</a></li>
        <li>My Profile</li>
      </ul>
    </nav>
  </div>
</div>
</div>
<div class="row"> 
	<div class="col-lg-12 col-md-12">
	  	<div class="utf_dashboard_list_box margin-top-0">
	  	<form method="post" action="{{asset('/')}}update-profile" enctype="multipart/form-data">
	  		@csrf
	    	<h4 class="gray"><i class="sl sl-icon-user"></i> Profile Details</h4>
	    	<div class="utf_dashboard_list_box-static"> 
		      	<div class="edit-profile-photo"> 
			      	<?php
					    if (Auth::user()->profile_photo_path) {
					       $profile_photo_path=asset('/').Auth::user()->profile_photo_path;
					    }
					    else{
					        $profile_photo_path='https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=7F9CF5&background=EBF4FF';
					    }
					?>
			      	<img src="{{$profile_photo_path}}" id="show_image" alt="" style="height: 200px; width: 200px; object-fit: cover;">
			        <div class="change-photo-btn">
			          <div class="photoUpload"> <span><i class="fa fa-upload"></i> Upload Photo</span>
			            <input type="file" id="image_input" accept="image/*" class="upload" name="profile_photo_path" onchange="PreviewImage();" />
			          </div>
			        </div>
		      	</div>
	      	<div class="my-profile">
		    	<div class="row with-forms">		    	
					<div class="col-md-4">
						<label>Name</label>						
						<input type="text" class="input-text" placeholder="Alex Daniel" required="true" value="{{Auth::user()->name}}" name="name">
					</div>
					<div class="col-md-4">
						<label>Phone</label>						
						<input readonly="" style="background-color: rgb(0,0,0,.1);" type="text" class="input-text" placeholder="(123) 123-456" required="true" value="{{Auth::user()->phone}}" name="phone">
					</div>
					<div class="col-md-4">
						<label>Email</label>						
						<input type="text" class="input-text" placeholder="test@example.com" required="true" value="{{Auth::user()->email}}" name="email">
					</div>
					<div class="col-md-4">
						<label>Current Address</label>						
						<input type="text" class="input-text" placeholder="Current Address" required="true" value="{{$user_info->current_address}}" name="current_address">
					</div>
					<div class="col-md-4">
						<label>Current City</label>	
						<select class="default" data-live-search="true" id="search_city" data-selected-text-format="count" data-size="7" title="Select Location"  name="city">
		                    @foreach($citis as $key=> $city)
		                    	@if($city->id==$user_info->city_id)
		                    		<option selected value="{{$city->id}}">{{$city->city}}</option>
		                    	@else
		                    		<option value="{{$city->id}}">{{$city->city}}</option>
		                    	@endif
		                    @endforeach
		                </select>
					</div>
					@if(Auth::user()->role_id==3)
					<div class="col-md-4">
						<label>Blood Group</label>						
						<select class="default" data-live-search="true" id="search_city" data-selected-text-format="count" data-size="7" title="Select Location" name="blood_group">
		                    <option {{($user_info->blood_group=='A+') ? 'selected' : '' }} value="A+">A RhD positive (A+)</option>
							<option {{($user_info->blood_group=='A-') ? 'selected' : '' }} value="A-">A RhD negative (A-)</option>
							<option {{($user_info->blood_group=='B+') ? 'selected' : '' }} value="B+">B RhD positive (B+)</option>
							<option {{($user_info->blood_group=='B-') ? 'selected' : '' }} value="B-">B RhD negative (B-)</option>
							<option {{($user_info->blood_group=='O+') ? 'selected' : '' }} value="O+">O RhD positive (O+)</option>
							<option {{($user_info->blood_group=='O-') ? 'selected' : '' }} value="O-">O RhD negative (O-)</option>
							<option {{($user_info->blood_group=='AB+') ? 'selected' : '' }} value="AB+">AB RhD positive (AB+)</option>
							<option {{($user_info->blood_group=='AB-') ? 'selected' : '' }} value="AB-">AB RhD negative (AB-)</option>
		                </select>
					</div>
					<div class="col-md-4">
						<label>Gender</label>						
						<select class="default" data-live-search="true" id="search_city" data-selected-text-format="count" data-size="7" title="Select Location" name="gender">
		                   	<option {{($user_info->gender=='M') ? 'selected' : '' }} value="M">Male</option>
							<option {{($user_info->gender=='F') ? 'selected' : '' }} value="F">Female</option>
							<option {{($user_info->gender=='O') ? 'selected' : '' }} value="O">Other</option>
		                </select>
					</div>
					<div class="col-md-4">
						<label>Date of Birth</label>						
						<input type="date" class="input-text" placeholder="18 Year" required="true" value="{{$user_info->dob}}" name="dob">
					</div>
					<div class="col-md-4">
						<label>Phone Number Status</label>						
						<select class="default" data-live-search="true" id="search_city" data-selected-text-format="count" data-size="7" title="Phone Number Status" name="phonestatus">
		                   	<option {{(Auth::user()->phonestatus=='1') ? 'selected' : '' }} value="1">Show</option>
							<option {{(Auth::user()->phonestatus=='0') ? 'selected' : '' }} value="0">Hide</option>
		                </select>
					</div>
					@endif
				</div>
				
	    	</div>
	      	<button class="button preview btn_center_item margin-top-15">Save Changes</button>
		</form>
		<center>
			<label style="color: green;">N.B: To update your phone please contact with support.</label>
		</center>		
	    </div>
	  </div>
	</div>
</div>
<script type="text/javascript">
	function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("image_input").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("show_image").src = oFREvent.target.result;
        };
    };
</script>
@endsection