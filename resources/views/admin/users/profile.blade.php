@extends('admin.layout.mainlayout')
@section('title',$users->name)
@section('content')
<div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                    	<?php
				            $imahepath=$users->profile_photo_path;            
				            $imagename=$users->name;
				            if ($imahepath) {
				               $profile_photo_path=asset('/').$imahepath;
				            }
				            else{
				                $profile_photo_path='https://ui-avatars.com/api/?name='.urlencode($imagename).'&color=7F9CF5&background=EBF4FF';
				            }
				          ?>
                      <img alt="image" src="{{$profile_photo_path}}" class="rounded-circle author-box-picture" style="height: 200px; width: 200px; object-fit: cover;">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <h3>{{$users->name}}</h3>
                      </div>
                      <div class="author-box-job">
                      	@if($users->role_id==1)
                      		Admin
                      	@elseif($users->role_id==2)
                      		Blood Bank
                      	@elseif($users->role_id==3)
                      		User
                      	@elseif($users->role_id==4)
                      		Blood Tent Ambassador
                      	@endif

                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Personal Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-4">                      
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                          {{$users->phone}}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                          {{$users->email}}
                        </span>
                      </p>
                      @if($users->role_id!=2)
                      <p class="clearfix">
                        <span class="float-left">
                          Birthday
                        </span>
                        <span class="float-right text-muted">
                          {{date('d M Y', strtotime($users->dob))}}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Gender
                        </span>
                        <span class="float-right text-muted">
                          @if($users->gender=='M')
                          	Male
                          @elseif($users->gender=='F')
                          	Female
                          @else
                          	Other
                          @endif
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Blood Group
                        </span>
                        <span class="float-right text-muted">
                          {{$users->blood_group}}
                        </span>
                      </p>
                      @endif
                      <p class="clearfix">
                        <span class="float-left">
                          Present address
                        </span>
                        <span class="float-right text-muted">
                          {{$users->current_address}}, {{$users->city}}, Bangladesh
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                    @endif
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">Profile</a>
                      </li>
                    </ul>
                      <div class="" id="about" role="tabpanel" aria-labelledby="profile-tab2">
                        <form method="post" class="needs-validation" action="{{asset('/')}}admin/update-profile">
                        	@csrf
                        	<input readonly="" hidden="" type="text" name="user_id" value="{{$users->id}}">
                          <div class="card-header">
                            <h4>Edit Profile</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-9 col-12">
                                <label>Name</label>
                                <input required type="text" class="form-control" name="name" value="{{$users->name}}">
                              </div>
                              <div class="form-group col-md-3 col-12">
                                <label>Role</label>

                                @if($users->role_id!=2)
                                <select class="form-control" name="role_id">
                                	<option <?= ($users->role_id == 1) ? 'selected':''; ?> value="1">Admin</option>
                                	<option <?= ($users->role_id == 3) ? 'selected':''; ?> value="3">User</option>
                                	<option <?= ($users->role_id == 4) ? 'selected':''; ?> value="4">Ambassador</option>
                                </select>
                                @else
                                <select class="form-control" name="role_id">
                                	<option <?= ($users->role_id == 2) ? 'selected':''; ?> value="2">Blood Bank</option>   	
                                </select>
                                @endif

                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input required type="email" class="form-control" name="email" value="{{$users->email}}">
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Phone (Must add +88 as country code)</label>
                                <input required type="tel" class="form-control" name="phone" value="{{$users->phone}}" minlength="14">
                              </div>
                            </div>


                            <div <?= ($users->role_id==2) ? 'hidden':'A+'; ?> class="row">
                              <div class="form-group col-md-4 col-12">
                                <label>Gender</label>
                                <select class="form-control" name="gender">
                                	<option <?= ($users->gender == 'M') ? 'selected':''; ?> value="M">Male</option>
                                	<option <?= ($users->gender == 'F') ? 'selected':''; ?> value="F">Female</option>
                                	<option <?= ($users->gender == 'O') ? 'selected':''; ?> value="O">Other</option>
                                </select>
                              </div>
                              <div class="form-group col-md-4 col-12">
                                <label>Blood Group</label>
                                <select class="form-control" name="blood_group">
			                        <option <?= ($users->blood_group == '') ? 'selected':'A+'; ?> value="A+">A RhD positive (A+)</option>
			                        <option <?= ($users->blood_group == '') ? 'selected':'A-'; ?> value="A-">A RhD negative (A-)</option>
			                        <option <?= ($users->blood_group == '') ? 'selected':'B+'; ?> value="B+">B RhD positive (B+)</option>
			                        <option <?= ($users->blood_group == '') ? 'selected':'B-'; ?> value="B-">B RhD negative (B-)</option>
			                        <option <?= ($users->blood_group == '') ? 'selected':'O+'; ?> value="O+">O RhD positive (O+)</option>
			                        <option <?= ($users->blood_group == '') ? 'selected':'O-'; ?> value="O-">O RhD negative (O-)</option>
			                        <option <?= ($users->blood_group == '') ? 'selected':'AB+'; ?> value="AB+">AB RhD positive (AB+)</option>
			                        <option <?= ($users->blood_group == '') ? 'selected':'AB-'; ?> value="AB-">AB RhD negative (AB-)</option>
			                    </select>
                              </div>
                              <div class="form-group col-md-4 col-12">
                                <label>Date of Birth</label>
                                <input required type="date" class="form-control" name="dob" value="{{$users->dob}}">                                
                              </div>
                            </div>


                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Present Address</label>
                                <input required type="test" class="form-control" name="current_address" value="{{$users->current_address}}">
                              </div>
                              <div class="form-group col-md-3 col-12">
                                <label>Present City</label>
                                <select class="form-control" name="city_id">
                                	@foreach($cities as $key=> $city)
			                        <option <?= ($users->city_id == $city->id) ? 'selected':'A+'; ?> value="{{$city->id}}">{{$city->city}}</option>
			                        @endforeach
			                    </select>
                              </div>
                              <div class="form-group col-md-3 col-12">
                                <label>Country</label>
                                <input required type="text" readonly="" class="form-control" value="Bangladesh" style="background: rgb(0,0,0,.1);">
                              </div>
                            </div>
       

                          </div>
                          <div class="card-footer text-right">
                            <button class="btn btn-primary">Update</button>
                          </div>
                        </form>
                      </div>



                  </div>
                </div>
              </div>
            </div>
@endsection