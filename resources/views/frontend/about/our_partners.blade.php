@extends('layouts.frontend.layout')
@section('title', 'Our Partners')
@section('content')
<div id="titlebar" class="gradient margin-bottom-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Our Partners</h2>          
          <nav id="breadcrumbs">
            <ul>
              <li><a href="index_1.html">Home</a></li>
              <li>Our Partners</li>
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
          <h3 class="headline_part centered"> Our Partners 
          	<span class="margin-top-15">These are our partners who help us to make the BloodTent project successfully. </span> </h3>
        </div>
      </div>
    </div>
    <div class="fullwidth_carousel_container_block margin-top-20">
      <div class="utf_testimonial_carousel testimonials"> 

      	<!--boraxip-->
      	
      		<div class="utf_carousel_review_part">
	          <div class="utf_testimonial_box">          	
	            <div class="testimonial">BoraxIP (www.boraxip.com) is a Professional Domain and Hosting Provider Platform. Here we will provide you only interesting content, which you will like very much.</div>
	          </div>
	          <div class="utf_testimonial_author"> 
	          	<img src="{{asset('/')}}frontend/images/partners/brand_logo_01.png" style="height: 85px; width: 85px; object-fit: contain;" alt="">
	            <h4>BoraxIp <span>Domain and Hosting partner</span></h4>
	          </div>
	        </div>

	        <div class="utf_carousel_review_part">
	          <div class="utf_testimonial_box">          	
	            <div class="testimonial">Hearts Tech (www.heartstech.com) is a Bangladesh based Gadgets and Computer Components buying eCommerce website.</div>
	          </div>
	          <div class="utf_testimonial_author"> <img src="{{asset('/')}}frontend/images/partners/brand_logo_02.png" style="height: 85px; width: 85px; object-fit: contain;" alt="">
	            <h4>Hearts Tech <span>Tech partner</span></h4>
	          </div>
	        </div>

	        <div class="utf_carousel_review_part">
	          <div class="utf_testimonial_box">        	
	            <div class="testimonial">Radio Hearts (www.radiohearts.com) is a vartiul radio station.</div>
	          </div>
	          <div class="utf_testimonial_author"> <img src="{{asset('/')}}frontend/images/partners/brand_logo_03.png" style="height: 85px; width: 85px; object-fit: contain;" alt="">
	            <h4>Radio Hearts <span>Media partner</span></h4>
	          </div>
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