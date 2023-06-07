@extends('layouts.common.layout')
@section('title', 'Prove Submit')
@section('content')
<div id="titlebar" class="dashboard_gradient">
<div class="row">
  <div class="col-md-12">
    <h2>Prove Submit</h2>
    <nav id="breadcrumbs">
      <ul>
        <li><a href="{{asset('/')}}">Home</a></li>
        <li><a href="{{asset('/')}}dashboard">Canvas</a></li>
        <li>Prove Submit</li>
      </ul>
    </nav>
  </div>
</div>
</div>
<div class="row"> 
	<div class="col-lg-12 col-md-12">
	  	<div class="utf_dashboard_list_box margin-top-0">
	  	<form method="post" action="{{asset('/')}}submit-prove-form" enctype="multipart/form-data">
	  		@csrf
	    	<h4 class="gray"><i class="sl sl-icon-user"></i> Profile Details</h4>
	    	<div class="utf_dashboard_list_box-static"> 
			<div class="my-profile">
		    	<div class="row with-forms">
		    		<div class="col-md-12" hidden="">
						<label>Request Id</label>						
						<input type="text" readonly="" class="input-text" required="true" value="{{$request_id}}" name="request_id">
					</div>	    	
					<div class="col-md-12">
						<label>Prove image(Less Than 1MB)</label>						
						<input type="file" class="input-text" accept="image/*" required="true" name="prove_image">
					</div>
					<div class="col-md-12">
						<label>Description</label>						
						<textarea name="prove_comment" required="true" placeholder="Write something..."></textarea>
					</div>
					<div class="col-md-12">
						<label>Donated Date</label>						
						<input type="date" class="input-text" placeholder="18 Year" required="true" name="donated_date">
					</div>
				</div>
	    	</div>
	      	<button class="button preview btn_center_item margin-top-15">Upload Prove</button>
	      </div>
		</form>		
	    </div>
	</div>
</div>
@endsection