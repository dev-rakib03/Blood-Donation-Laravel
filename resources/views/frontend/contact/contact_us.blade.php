@extends('layouts.frontend.layout')
@section('title', 'Contact Us')
@section('content')
<!-- Content -->
<div id="titlebar" class="gradient margin-bottom-0">  	<div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Contact Us</h2>          
          <nav id="breadcrumbs">
            <ul>
              <li><a href="index_1.html">Home</a></li>
              <li>Contact Us</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
</div>  
<br>
<br>
  <div class="container">
    <div class="row"> 
      <div class="col-md-8">
        <section id="contact" class="margin-bottom-70">
          <h4><i class="sl sl-icon-phone"></i> Contact Form</h4>          
          <form id="contactform" method="post" action="{{asset('/')}}contact-us-post">
          	@csrf
            <div class="row">
              <div class="col-md-6">  
				  <input name="fname" type="text" placeholder="Frist Name" required />                
              </div>
              <div class="col-md-6">                
                  <input name="lname" type="text" placeholder="Last Name" required />                
              </div>
              <div class="col-md-6">                
                  <input name="email" type="email" placeholder="Email" required />                
              </div>
              <div class="col-md-6">
                  <input name="subject" type="text" placeholder="Subject" required />              
              </div>
			  <div class="col-md-12">
				  <textarea name="comments" cols="40" rows="2" id="comments" placeholder="Your Message" required></textarea>
			  </div>
            </div>            
            <input type="submit" class="submit button" id="submit" value="Submit" />
          </form>
        </section>
      </div>
      
      <div class="col-md-4">
		<div class="utf_box_widget margin-bottom-70">
			<h3><i class="sl sl-icon-map"></i>Contact Info</h3>
			<div class="utf_sidebar_textbox">
			  <ul class="utf_contact_detail">
				<li><strong>Phone&nbsp;&nbsp;:&nbsp;</strong> <span>+880 000 000 000</span></li>
				<li><strong>Web&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</strong> <span><a href="https://bloodtent.com">www.bloodtent.com</a></span></li>
				<li><strong>E-Mail&nbsp;:&nbsp;</strong> <span><a href="mailto:info@bloodtent.com">info@bloodtent.com</a></span></li>
				<!--<li><strong>Address:-</strong> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</span></li>-->
			  </ul>
			</div>	
		</div>
      </div>
    </div>
  </div>
@endsection