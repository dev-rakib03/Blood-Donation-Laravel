@extends('admin.layout.mainlayout')
@section('title', 'Dashboard')
@section('content')

<div class="row ">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15"> Total User</h5>
                  <h2 class="mb-3 font-18">{{$total_user}}</h2>
                  <!--<p class="mb-0"><span class="col-green">10%</span> Increase</p>-->
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{asset('/')}}admin-assets/img/banner/1.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15"> Total Blood Bank</h5>
                  <h2 class="mb-3 font-18">{{$total_bloodbank}}</h2>
                  <!--<p class="mb-0"><span class="col-orange">09%</span> Decrease</p>-->
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{asset('/')}}admin-assets/img/banner/2.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Total Donated</h5>
                  <h2 class="mb-3 font-18">{{$total_donated}}</h2>
                  <!--<p class="mb-0"><span class="col-green">18%</span>Increase</p>-->
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{asset('/')}}admin-assets/img/banner/3.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Total Donation Request</h5>
                  <h2 class="mb-3 font-18">{{$total_donation_request}}</h2>
                  <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{asset('/')}}admin-assets/img/banner/4.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Pending Donation Proves</h5>
                  <h2 class="mb-3 font-18">{{$pending_proves}}</h2>
                  <!--<p class="mb-0"><span class="col-green">42%</span> Increase</p>-->
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{asset('/')}}admin-assets/img/banner/5.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection