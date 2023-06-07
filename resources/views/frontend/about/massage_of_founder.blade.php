@extends('layouts.frontend.layout')
@section('title', 'Massage of Founder')
@section('content')
<div id="titlebar" class="gradient margin-bottom-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Massage Of Founder</h2>          
          <nav id="breadcrumbs">
            <ul>
              <li><a href="index_1.html">Home</a></li>
              <li>Massage Of Founder</li>
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
        	<center>
        		<img src="{{asset('/')}}frontend/images/founder.jpg" style="max-height: 400px;">
        	</center>
          <h3 class="headline_part centered">Md Rakibuzzaman<br>The Honorable Founder of BloodTent
          	<span class="margin-top-15">Welcome to BloodTent. Blood is the most important element of the human body. Sometimes we need blood in medical cases. BloodTent will help you to find the blood donor in your emergency. It's totally free of cost. Those who will find donner I will request you to also donate blood. Your blood can save a life or a family. Stay with BloodTent.<br>Thank you</span> 
          </h3>
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
@endsection