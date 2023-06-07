<!DOCTYPE html>
<html lang="zxx">
<head>
<meta name="author" content="Md Rakibuzzman">
<meta name="description" content="Full-stuck web devoloper">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title')-BloodTent</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('/')}}frontend/images/favicon.png">
<!-- Style CSS -->
<link rel="stylesheet" href="{{asset('/')}}frontend/css/stylesheet.css">
<link rel="stylesheet" href="{{asset('/')}}frontend/css/mmenu.css">
<link rel="stylesheet" href="{{asset('/')}}frontend/css/style.css" id="colors">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&display=swap&subset=latin-ext,vietnamese" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">

<!--login-->
  <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/login/css/main.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
<!--end login-->
<style type="text/css">
  .mobi{display: none;}
  @media only screen and (max-width: 1024px){
    .mobi{display: block;}
    .pc{display: none;}
  }
  }
</style>
@PWA
</head>
<body class="header-one">

<!-- Wrapper -->
<div id="main_wrapper">
  <header id="header_part"> 
    <div id="header">
      <div class="container"> 
        <div class="utf_left_side"> 
          <div id="logo"> <a href="{{asset('/')}}"><img src="{{asset('/')}}frontend/images/logo.png" alt=""></a> </div>
          
          <div class="mmenu-trigger">
      			<button class="hamburger utfbutton_collapse" type="button">
      				<span class="utf_inner_button_box">
      					<span class="utf_inner_section"></span>
      				</span>
      			</button>
		      </div>
          <nav id="navigation" class="style_one">
            <ul id="responsive">
              <li><a class="{{ (request()->is('/')) ? 'current' : '' }}" href="{{asset('/')}}">Home</a></li>			  
              <li><a class="{{ (request()->is('donors')) ? 'current' : '' }}" href="{{asset('/')}}donors">Donors</a></li>
              <li><a class="{{ (request()->is('blood-bank')) ? 'current' : '' }}" href="{{asset('/')}}blood-bank">Blood Bank</a></li>
              <!--<li><a href="{{asset('/')}}blog">Blog</a></li>-->
              <li><a class="{{ (request()->is('contact-us')) ? 'current' : '' }}" href="{{asset('/')}}contact-us">Contact US</a></li>
              <li><a class="{{ (request()->is('massage-of-founder')) ? 'current' : '' }}{{ (request()->is('about-us')) ? 'current' : '' }}{{ (request()->is('our-pastners')) ? 'current' : '' }}" href="#">About</a>
                <ul>
                  <li><a href="{{asset('/')}}massage-of-founder">Massage of Founder</a></li>
                  <li><a href="{{asset('/')}}about-us">About US</a></li>
                  <li><a href="{{asset('/')}}our-pastners">Our Partners</a></li>
                </ul>
              </li>
            </ul>
          </nav>
          @if(Auth::check())  
          <div class="dashboard_header_button_item has-noti js-item-menu mobi">
            <i class="sl sl-icon-bell"></i>
            <p id="n_cm"></p>
            <div class="dashboard_notifi_dropdown js-dropdown">
              <div class="dashboard_notifi_title">
                <center>
                  <p>You Have <span id="notim"></span> Notifications</p>
                </center>                
              </div>
              <span id="notifycm"></span>
            </div>
          </div>

          <div class="utf_user_menu mobi">
            @include('layouts.frontend.profile_manu')
          </div>
          @endif
          <div class="clearfix"></div>
        </div>
        <div class="utf_right_side">
            @if(!Auth::check())
          <div class="header_widget"> 
            <a href="{{asset('/')}}login" class="button border with-icon">
              <i class="fa fa-sign-in"></i> Sign In
            </a> 
            <a href="{{asset('/')}}phone-verify" class="button border with-icon">
              <i class="sl sl-icon-user"></i>Register
            </a>
          </div>
            @endif
            @if(Auth::check())
          <div class="header_widget  pc"> 
            <div class="dashboard_header_button_item has-noti js-item-menu">
              <i class="sl sl-icon-bell"></i>
              <p id="n_c"></p>
              <div class="dashboard_notifi_dropdown js-dropdown">
                <div class="dashboard_notifi_title">
                  <center>
                    <p>You Have <span id="noti"></span> Notifications</p>
                  </center>                  
                </div>
                <span id="notifyc"></span>
              </div>
            </div>
            
            <div class="utf_user_menu">
              @include('layouts.frontend.profile_manu')
            </div>
          </div>
            @endif          
        </div>
      </div>
    </div>    
  </header>
  <div class="clearfix"></div>
  <!--alart msg-->
  @if(session()->exists('danger'))
  <div class="row">
    <div class="col-md-12">
      <div class="notification error closeable margin-bottom-30">
        <p>{{ session()->get('danger') }}{{ session()->forget('danger') }}</p>
        <a class="close" href="#"></a> 
      </div>
    </div>
  </div>  
  @endif
  @if(session()->exists('success'))
  <div class="row">
    <div class="col-md-12">
      <div class="notification success closeable margin-bottom-30">
        <p>{{ session()->get('success') }}{{ session()->forget('success') }}!</p>
        <a class="close" href="#"></a> 
      </div>
    </div>
  </div> 
  @endif
  @if(session()->exists('info'))
  <div class="row">
    <div class="col-md-12">
      <div class="notification warning closeable margin-bottom-30">
        <p> {{ session()->get('info') }}{{ session()->forget('info') }}</p>
        <a class="close" href="#"></a> 
      </div>
    </div>
  </div>
  @endif
  @if(session()->exists('warning'))
  <div class="row">
    <div class="col-md-12">
      <div class="notification warning closeable margin-bottom-30">
        <p>{{ session()->get('warning') }}{{ session()->forget('warning') }}</p>
        <a class="close" href="#"></a> 
      </div>
    </div>
  </div>
  @endif

  <!--main content-->
  @yield('content')
  <!--main content end-->

  <section class="fullwidth_block margin-bottom-0 padding-top-30 padding-bottom-65" data-background-color="linear-gradient(to bottom, #f9f9f9 0%, rgba(255, 255, 255, 1))">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="headline_part centered margin-bottom-40 margin-top-30">Our Partners</h3>
			</div>
			<div class="col-md-12">
        <center>
          <div class="companie-logo-slick-carousel utf_dots_nav margin-bottom-10">
            <a href="https://boraxip.com">
              <div class="item">
                <img src="{{asset('/')}}frontend/images/partners/brand_logo_01.png" alt="">
              </div>
            </a>
              
            <a href="https://heartstech.com">
              <div class="item">
                <img src="{{asset('/')}}frontend/images/partners/brand_logo_02.png" alt="">
              </div>
            </a>
              
            <a href="https://radiohearts.com">
              <div class="item">
                <img src="{{asset('/')}}frontend/images/partners/brand_logo_03.png" alt="">
              </div>
            </a>
                 
          </div>
        </center>
  				
			</div>
		</div>
	</div>
  </section>
  
  <!--<section class="utf_cta_area_item utf_cta_area2_block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="utf_subscribe_block clearfix">
                    <div class="col-md-8 col-sm-7">
                        <div class="section-heading">
                            <h2 class="utf_sec_title_item utf_sec_title_item2">Subscribe to Newsletter!</h2>
                            <p class="utf_sec_meta">
                                Subscribe to get latest updates and information.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <div class="contact-form-action">
                            <form method="post">
                                <span class="la la-envelope-o"></span>
                                <input class="form-control" type="email" placeholder="Enter your email" required="">
                                <button class="utf_theme_btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
	</section>-->
  
  <!-- Footer -->
  <div id="footer" class="footer_sticky_part"> 
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Useful Links</h4>
          <ul class="social_footer_link">
            <li><a href="{{asset('/')}}">Home</a></li>
            <li><a href="{{asset('/')}}donors">Donors</a></li>
            <li><a href="{{asset('/')}}blood-bank">Blood Bank</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>My Account</h4>
          <ul class="social_footer_link">
            <li><a href="{{asset('/')}}login">Sign In</a></li>
            <li><a href="{{asset('/')}}register">Register</a></li>
            <li><a href="{{asset('/')}}profile">Profile</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Pages</h4>
          <ul class="social_footer_link">
            <li><a href="{{asset('/')}}our-pastners">Our Partners</a></li>
            <li><a href="{{asset('/')}}terms-conditions">Terms & Conditions</a></li>
            <li><a href="{{asset('/')}}privacy-policy">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>Help</h4>
          <ul class="social_footer_link">
            <li><a href="{{asset('/')}}about-us">About US</a></li>
            <li><a href="{{asset('/')}}contact-us">Contact Us</a></li>
            <li><a href="{{asset('/')}}how-to-find-donner">How to find donner.</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12"> 
          <h4>About Us</h4>
          <p>BloodTent is a blood-finding website where you can find blood donner easily. It's a non-profitable organization.</p>          
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="footer_copyright_part">Copyright © 2021 BloodTent All Rights Reserved.</div>
        </div>
      </div>
    </div>
  </div>  
  <div id="bottom_backto_top"><a href="#"></a></div>
</div>

<!-- Scripts --> 
<script src="{{asset('/')}}frontend/scripts/jquery-3.4.1.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/chosen.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/slick.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/rangeslider.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/magnific-popup.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/jquery-ui.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/bootstrap-select.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/mmenu.js"></script>
<script src="{{asset('/')}}frontend/scripts/tooltips.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/color_switcher.js"></script>
<script src="{{asset('/')}}frontend/scripts/jquery_custom.js"></script>
<script src="{{asset('/')}}frontend/scripts/typed.js"></script>
@if( strtok($_SERVER['REQUEST_URI'], '?') == '/')
<script>
var typed = new Typed('.typed-words', {
strings: ["Blood Donner","Blood Bank"],
  typeSpeed: 80,
  backSpeed: 80,
  backDelay: 4000,
  startDelay: 1000,
  loop: true,
  showCursor: true
});
</script>
@endif
<!-- Style Switcher -->
<!--<div id="color_switcher_preview">
  <h2>Choose Your Color <a href="#"><i class="fa fa-cog fa-spin (alias)"></i></a></h2>	
	<div>
		<ul class="colors" id="color1">
			<li><a href="#" class="stylesheet"></a></li>
			<li><a href="#" class="stylesheet_1"></a></li>
			<li><a href="#" class="stylesheet_2"></a></li>			
			<li><a href="#" class="stylesheet_3"></a></li>						
			<li><a href="#" class="stylesheet_4"></a></li>
			<li><a href="#" class="stylesheet_5"></a></li>			
		</ul>
	</div>		
</div>-->
<!--===============================================================================================-->
<script src="{{asset('/')}}frontend/login/js/main.js"></script>
@if(Auth::check())
<script type="text/javascript">
var noti_count=document.getElementById("notifyc");
var noti_countm=document.getElementById("notifycm");
var noti=document.getElementById("noti");
var notim=document.getElementById("notim");
var n_c=document.getElementById("n_c");
var n_cm=document.getElementById("n_cm");
setInterval(() =>{
  let notifg = new XMLHttpRequest();
  notifg.overrideMimeType("application/json");
  notifg.open("GET", '<?php echo env("APP_URL"); ?>'+'/notification-get-notify', true);
  notifg.onload = ()=>{
    if(notifg.readyState === XMLHttpRequest.DONE){
        if(notifg.status === 200){
          let data = JSON.parse(notifg.responseText);
          noti_count.innerHTML = data.noti_count;
          noti_countm.innerHTML = data.noti_count;
          noti.innerHTML= data.unnotify;
          notim.innerHTML= data.unnotify;
          n_c.innerHTML= data.unnotify;
          n_cm.innerHTML= data.unnotify;
          if (data.unnotify>0) {
            n_c.style.display= 'block';
            n_cm.style.display= 'block';
          }
        }
    }
  }
  notifg.send();
}, 1000);
</script>

<script type="text/javascript">
  function seen_notfy(notify_id) {
    
    $.ajax({
    type : 'get',
    url : '{{URL::to("notification/seen")}}',
    data:{'notify_id':notify_id},
    success:function(data){
      window.location = data;
    }
    });
  }
</script>
<!--user active-->
<script type="text/javascript">
  function user_active_value() {
    $.ajax({
      type : 'get',
      url : '{{URL::to("make-active-user")}}',
      success:function(data){
        
      }
    });
  }

  user_active_value();

</script>
@endif
</body>
</html>