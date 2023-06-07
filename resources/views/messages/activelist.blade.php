@extends('layouts.frontend.layout')
@section('title', 'Active')
@section('content')
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<link rel="stylesheet" href="{{asset('/')}}message/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<br>
<!-- chatbox -->
			<div class="wrapper">
			    <section class="users">
			      <header>
			        <div class="content">
			        <?php
					    if (Auth::user()->profile_photo_path) {
					       $profile_photo_path=asset('/').Auth::user()->profile_photo_path;
					    }
					    else{
					        $profile_photo_path='https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=7F9CF5&background=EBF4FF';
					    }
					?>
			          <img src="{{$profile_photo_path}}" alt="">
			          <div class="details">
			            <span>{{Auth::user()->name}}</span>
			            <p>
			            	@if(Auth::user()->active_status > date("Y-m-d H:i:s"))
			            	Active Now
			            	@else
			            	Offline
			            	@endif			            	
			            </p>
			          </div>
			        </div>
			      </header>
			      <div class="search">
			        <span class="text">Select an user to start chat</span>
			        <input type="text" placeholder="Enter name to search...">
			        <button><i class="fas fa-search"></i></button>
			      </div>
			      <div class="users-list">
			  
			      </div>
			    </section>
			  </div>
<!-- endchatbox -->
<br>
<br>
<script type="text/javascript">
	const domain ='<?php echo env("APP_URL"); ?>';
</script>
<script src="{{asset('/')}}message/js/users.js"></script>
@endsection