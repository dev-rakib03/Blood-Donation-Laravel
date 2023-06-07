@extends('layouts.frontend.layout')
@section('title', 'About Us')
@section('content')
<div id="titlebar" class="gradient margin-bottom-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>About Us</h2>          
          <nav id="breadcrumbs">
            <ul>
              <li><a href="index_1.html">Home</a></li>
              <li>About Us</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
</div>
  
  <section class="utf_testimonial_part fullwidth_block padding-top-75 padding-bottom-75"> 
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h3 class="headline_part centered"> About BloodTent 
          	<span class="margin-top-15">BloodTent is a blood-donner-finding website where you can find your blood-donner in your nearby place. You can also find a nearby blood bank. It is a non-profitable organization. BloodTent does not charge for any service.</span> </h3>
        </div>
      </div>
    </div>
  </section>
  
  <div class="parallax" data-background="{{asset('/')}}frontend/images/donor.jpg"> 
    <div class="utf_text_content white-font">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <h2>Find Your Nearby Blood Donner</h2>
            <p>There are several types of blood donations and one donor can help up to three patients.A single unit of blood can be separated into different components such as red blood cells, plasma and platelets.We will help you to find a blood donor in your emergency.</p>
            <a href="{{asset('/')}}login" class="button margin-top-25">Get Started</a> </div>
        </div>
      </div>
    </div>   
  </div>
	
  <section class="fullwidth_block padding-bottom-70" data-background-color="#f9f9f9"> 
	  <div class="container">
		<div class="row">
		  <div class="col-md-8 col-md-offset-2">
			<h2 class="headline_part centered margin-top-80">How It Works? <span class="margin-top-10">Discover & contact with nearby blood donner</span> </h2>
		  </div>
		</div>
		<div class="row container_icon"> 
		  <div class="col-md-4 col-sm-4 col-xs-12">
			<div class="box_icon_two box_icon_with_line"> <i class="im im-icon-Map-Marker2"></i>
			  <h3>Find Nearby Blood Donner</h3>
			  <p>Search with location and blood group and get the donner list available.</p>
			</div>
		  </div>
		  
		  <div class="col-md-4 col-sm-4 col-xs-12">
			<div class="box_icon_two box_icon_with_line"> <i class="im im-icon-Mail-Add"></i>
			  <h3>Contact with Donner</h3>
			  <p>Contact donner with phone, email or live chat.</p>
			</div>
		  </div>
		  
		  <div class="col-md-4 col-sm-4 col-xs-12">
			<div class="box_icon_two"> <i class="im im-icon-Administrator"></i>
			  <h3>Get Blood Donation</h3>
			  <p>Get blood donation and update it on your profile.</p>
			</div>
		  </div>
		</div>
	  </div>
  </section>
@endsection