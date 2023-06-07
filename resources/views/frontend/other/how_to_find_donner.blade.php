@extends('layouts.frontend.layout')
@section('title', 'How to find donor')
@section('content')
<div id="titlebar" class="gradient margin-bottom-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>How to find donor</h2>          
          <nav id="breadcrumbs">
            <ul>
              <li><a href="index_1.html">Home</a></li>
              <li>How to find donor</li>
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
          <h3 class="headline_part centered">How to find donor</h3>
          <center>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/M5ADyLmmoIc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </center>
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