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
    <section class="chat-area">
      <header>
        <a href="{{asset('/')}}messages" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <?php
		    if ($chat_user->profile_photo_path) {
		       $profile_photo_path=asset('/').$chat_user->profile_photo_path;
		    }
		    else{
		        $profile_photo_path='https://ui-avatars.com/api/?name='.urlencode($chat_user->name).'&color=7F9CF5&background=EBF4FF';
		    }
		?>
        <img src="{{$profile_photo_path}}" alt="">
        <div class="details">
          <span>{{$chat_user->name}}</span>
          <p>
          	@if($chat_user->active_status > date("Y-m-d H:i:s"))
        	Active Now
        	@else
        	Offline
        	@endif
          </p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">

        <input hidden="" readonly="" type="text" class="incoming_id" name="incoming_id" value="{{$chat_user->id}}" style="display: none;">

        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">

        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
<!-- endchatbox -->
<br>
<br>
<script type="text/javascript">
	const domain ='<?php echo env("APP_URL"); ?>';
</script>
  <script src="{{asset('/')}}message/js/chat.js"></script>
@endsection