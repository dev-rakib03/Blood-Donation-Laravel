@extends('layouts.frontend.layout')
@section('title', 'Page Not Found')
@section('content')
<div id="titlebar" class="gradient notfound_mr_bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Page Not Found</h2>
          <nav id="breadcrumbs">
            <ul>
              <li><a href="/">Home</a></li>
              <li>Page Not Found</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
</div>
  
  <div class="not_found_block">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <section id="not-found" class="center">
            <h2 style="color: red;">404</h2>
            <p>Page Not Found !</p>
            <div class="utf_error_description_part utf_ferror_description"> <strong class="f-primary animated v fadeInLeft">Sorry, this page does not exist</strong> <span class="f-primary animated v fadeInRight">The link you clicked might be corrupted, or the page may have been removed.</span> </div>
          </section>
        </div>
      </div>
    </div>
  </div>
@endsection