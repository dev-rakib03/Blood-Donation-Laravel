@extends('admin.layout.mainlayout')
@section('title','Add User')
@section('content')
<div class="row mt-sm-4">           
  <div class="col-12 col-md-12 col-lg-12">
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
          <div class="" id="about" role="tabpanel" aria-labelledby="profile-tab2">
            <form method="post" class="needs-validation" action="{{asset('/')}}admin/add-user-save">
            	@csrf
              <div class="card-header">
                <h4>Add Profile</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-9 col-12">
                    <label>Name</label>
                    <input required type="text" class="form-control" name="name">
                  </div>
                  <div class="form-group col-md-3 col-12">
                    <label>Role</label>

                    @if(Auth::user()->role_id==1)
                    <select class="form-control" id="role_c" onchange="d_role();" name="role_id">
                      <option hidden="" value="">Select</option>
                    	<option value="1">Admin</option>
                      <option value="4">Ambassador</option>
                    	<option value="3">User</option>
                      <option value="2">Blood Bank</option> 
                    </select>
                    @else
                    <select class="form-control" id="role_c" onchange="d_role();" name="role_id">
                      <option hidden="" value="">Select</option>
                      <option value="3">User</option>
                    	<option value="2">Blood Bank</option>   	
                    </select>
                    @endif
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>Email</label>
                    <input required type="email" class="form-control" name="email">
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Phone (Must add +88 as country code)</label>
                    <input required type="tel" class="form-control" name="phone" minlength="14">
                  </div>
                </div>

                <span id="no_bank">
                  <div class="row">
                    <div class="form-group col-md-4 col-12">
                      <label>Gender</label>
                      <select class="form-control" name="gender">
                        <option hidden="" value="">Select</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Other</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 col-12">
                      <label>Blood Group</label>
                      <select class="form-control" name="blood_group">
                        <option hidden="" value="">Select</option>
                        <option value="A+">A RhD positive (A+)</option>
                        <option value="A-">A RhD negative (A-)</option>
                        <option value="B+">B RhD positive (B+)</option>
                        <option value="B-">B RhD negative (B-)</option>
                        <option value="O+">O RhD positive (O+)</option>
                        <option value="O-">O RhD negative (O-)</option>
                        <option value="AB+">AB RhD positive (AB+)</option>
                        <option value="AB-">AB RhD negative (AB-)</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4 col-12">
                      <label>Date of Birth</label>
                      <input type="date" class="form-control" name="dob">                                
                    </div>
                  </div>
                </span>
                  


                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>Present Address</label>
                    <input required type="test" class="form-control" name="current_address">
                  </div>
                  <div class="form-group col-md-3 col-12">
                    <label>Present City</label>
                    <select class="form-control" name="city_id">
                      <option hidden="" value="">Select</option>
                    	@foreach($cities as $key=> $city)
                        <option value="{{$city->id}}">{{$city->city}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-3 col-12">
                    <label>Country</label>
                    <input required type="text" readonly="" class="form-control" value="Bangladesh" style="background: rgb(0,0,0,.1);">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label>Password</label>
                    <input required type="password" class="form-control" name="password" minlength="8">
                  </div>
                </div>

              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </form>
          </div>



      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function d_role() {
    var role=document.getElementById('role_c').value;
    if (role==2) {
      document.getElementById('no_bank').style.display="none";
    }
    else{
      document.getElementById('no_bank').style.display="block";
    }
  }
</script>
@endsection