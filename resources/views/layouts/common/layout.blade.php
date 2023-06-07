<!DOCTYPE html>
<html lang="zxx">
<head>
<meta name="author" content="Md Rakibuzzman">
<meta name="description" content="">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title')-BloodTent</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('/')}}frontend/images/favicon.png">
<!-- Style CSS -->
<link rel="stylesheet" href="{{asset('/')}}frontend/css/stylesheet.css">
<link rel="stylesheet" href="{{asset('/')}}frontend/css/mmenu.css">
<link rel="stylesheet" href="{{asset('/')}}frontend/css/perfect-scrollbar.css">
<link rel="stylesheet" href="{{asset('/')}}frontend/css/style.css" id="colors">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&display=swap&subset=latin-ext,vietnamese" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
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
<body>

<!-- Wrapper -->
<div id="main_wrapper"> 
  <header id="header_part" class="fixed fullwidth_block dashboard"> 
    <div id="header" class="not-sticky">
      <div class="container"> 
        <div class="utf_left_side"> 
          <div id="logo"> 
            <a href="{{asset('/')}}">
              <img src="{{asset('/')}}frontend/images/logo.png" alt=""></a> 
              <a href="{{asset('/')}}" class="dashboard-logo">
                <img src="{{asset('/')}}frontend/images/logo.png" alt="">
              </a> 
          </div>
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
  <div id="dashboard"> 
    <a href="#" class="utf_dashboard_nav_responsive" style="margin-top: 30px;"><i class="fa fa-reorder"></i>Sidebar Menu</a>
    <div class="utf_dashboard_navigation js-scrollbar">
      <div class="utf_dashboard_navigation_inner_block">
        <ul>
          <li class="{{ (request()->is('canvas')) ? 'active' : '' }}"><a href="{{asset('/')}}dashboard"><i class="sl sl-icon-layers"></i> Dashboard</a></li>
          @if(Auth::user()->role_id==3)
          <li class="{{ (request()->is('my-request')) ? 'active' : '' }}"><a href="{{asset('/')}}my-request"><i class="sl sl-icon-plus"></i> My Request</a></li>
          @endif
          <li class="{{ (request()->is('blood-request')) ? 'active' : '' }}"><a href="{{asset('/')}}blood-request"><i class="sl sl-icon-drop"></i> Blood Request</a></li>
          <li class="{{ (request()->is('donated-list')) ? 'active' : '' }}"><a href="{{asset('/')}}donated-list"><i class="sl sl-icon-layers"></i> Donated List</a></li> 
          <li class="{{ (request()->is('messages')) ? 'active' : '' }}"><a href="{{asset('/')}}messages"><i class="sl sl-icon-envelope-open"></i> Messages</a></li>
          <li class="{{ (request()->is('edit-profile')) ? 'active' : '' }}"><a href="{{asset('/')}}edit-profile"><i class="sl sl-icon-user"></i> My Profile</a></li>
          <li class="{{ (request()->is('change-password')) ? 'active' : '' }}"><a href="{{asset('/')}}change-password"><i class="sl sl-icon-key"></i> Change Password</a></li>
        </ul>
      </div>
    </div>
    <div class="utf_dashboard_content">
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

      <div class="col-md-12">
        <div class="footer_copyright_part">Copyright © 2021 BloodTent All Rights Reserved.</div>
      </div>
    </div>
  </div>
</div>    


<!-- Scripts --> 
<script src="{{asset('/')}}frontend/scripts/jquery-3.4.1.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/chosen.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/perfect-scrollbar.min.js"></script>
<script src="{{asset('/')}}frontend/scripts/slick.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/rangeslider.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/magnific-popup.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/jquery-ui.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/mmenu.js"></script>
<script src="{{asset('/')}}frontend/scripts/tooltips.min.js"></script> 
<script src="{{asset('/')}}frontend/scripts/color_switcher.js"></script>
<script src="{{asset('/')}}frontend/scripts/jquery_custom.js"></script>
<script>
(function($) {
try {
	var jscr1 = $('.js-scrollbar');
	if (jscr1[0]) {
		const ps1 = new PerfectScrollbar('.js-scrollbar');

	}
    } catch (error) {
        console.log(error);
    }
})(jQuery);
</script>
<!-- Style Switcher -->
<!--<div id="color_switcher_preview">
  <h2>Choose Your Color <a href="#"><i class="fa fa-gear fa-spin (alias)"></i></a></h2>	
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

@if(Auth::check())
<script type="text/javascript">
var noti_count=document.getElementById("notifyc");
var noti_countm=document.getElementById("notifycm");
var noti=document.getElementById("noti");
var notim=document.getElementById("notim");
var n_c=document.getElementById("n_c");
var n_cm=document.getElementById("n_cm");
setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.overrideMimeType("application/json");
  xhr.open("GET", '<?php echo env("APP_URL"); ?>'+'/notification-get-notify', true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = JSON.parse(xhr.responseText);
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
  xhr.send();
}, 1000);
</script>
@endif
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
</body>
</html>