@extends('layouts.common.layout')
@section('title', 'Canvas')
@section('content')
<!-- Dashboard -->
<div id="titlebar" class="dashboard_gradient">
  <div class="row">
    <div class="col-md-12">
      <h2>Canvas</h2>
      <nav id="breadcrumbs">
        <ul>
          <li><a href="/">Home</a></li>
          <li>Canvas</li>
        </ul>
      </nav>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6">
  <div class="utf_dashboard_stat color-2">
    <div class="utf_dashboard_stat_content">
      <h4>{{count($pending_req)}}</h4>
      <span>Pending Request</span>
    </div>
    <div class="utf_dashboard_stat_icon"><i class="im im-icon-Add-UserStar"></i></div>
  </div>
</div>

<div class="col-lg-4 col-md-6">
  <div class="utf_dashboard_stat color-3">
    <div class="utf_dashboard_stat_content">
      <h4>{{count($pending_prove)}}</h4>
      <span>Pending Submit Prove</span>
    </div>
    <div class="utf_dashboard_stat_icon"><i class="im im-icon-Align-JustifyRight"></i></div>
  </div>
</div>

<div class="col-lg-4 col-md-6">
  <div class="utf_dashboard_stat color-4">
    <div class="utf_dashboard_stat_content">
      <h4>{{count($total_donated)}}</h4>
      <span>Total Donated</span>
    </div>
    <div class="utf_dashboard_stat_icon"><i class="im im-icon-Diploma"></i></div>
  </div>
</div>
@endsection