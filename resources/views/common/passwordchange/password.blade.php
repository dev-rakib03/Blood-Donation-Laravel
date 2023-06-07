@extends('layouts.common.layout')
@section('title', 'Change password')
@section('content')
      <div id="titlebar" class="dashboard_gradient">
        <div class="row">
          <div class="col-md-12">
            <h2>Change Password</h2>
            <nav id="breadcrumbs">
              <ul>
                <li><a href="{{asset('/')}}">Home</a></li>
                <li><a href="{{asset('/')}}dashboard">Canvas</a></li>
                <li>Change Password</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="row"> 
        <div class="col-lg-12 col-md-12">
          <div class="utf_dashboard_list_box margin-top-0">
            <h4 class="gray"><i class="sl sl-icon-key"></i> Change Password</h4>
            <div class="utf_dashboard_list_box-static"> 
              <div class="my-profile">
              	<form method="post" action="{{asset('/')}}update-password">
              		@csrf
				    <div class="row with-forms">
						<div class="col-md-4">
							<label>Current Password</label>						
							<input type="password" class="input-text" required="" name="old_password" placeholder="*********" value="" >
						</div>
						<div class="col-md-4">
							<label>New Password</label>						
							<input type="password" class="input-text" required="true" id="new-password" name="new_password" placeholder="*********" value="">
						</div>
						<div class="col-md-4">
							<label>Confirm New Password</label>
							<input type="password" class="input-text" required="true" id="re-password" name="re_password"  placeholder="*********" value="" oninput="check_pass(this.value)">
							<span id="p_m"></span>
						</div>
						<div class="col-md-12">
							<button class="button btn_center_item margin-top-15">Change Password</button>
						</div>
					</div>
				</form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
      	function check_pass(re_pass) {
      		var new_pass= document.getElementById('new-password').value;
      		if(re_pass==""){
      			document.getElementById('p_m').innerHTML="";
      		}
      		else if (re_pass!=new_pass) {
      			document.getElementById('p_m').innerHTML="<span style='color:red'>Password not match</span>";
      		}
      		else{
      			document.getElementById('p_m').innerHTML="<span style='color:green'>Password match</span>";
      		}
      	}
      </script>
@endsection