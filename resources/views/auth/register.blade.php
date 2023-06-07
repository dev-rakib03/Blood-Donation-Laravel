@extends('layouts.frontend.layout')
@section('title', 'Register')
@section('content')
<script type="text/javascript">

   if (!sessionStorage.getItem('validnumber')) {
        let url = "/phone-verify";
        document.location.href=url;
    }

</script>
<style type="text/css">
    .wrap-login100{
        width: 780px;
    }
</style>
<div class="limiter">      
      <div class="container-login100">
        <div class="wrap-login100">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
            @csrf
            <span class="login100-form-title">
              Register
            </span>
            <br>


            <div class="wrap-input100 validate-input" data-validate = "Write full name">
              <input type="text"class="input100" :value="old('name')"  style="border: none; outline: none;background: rgb(0,0,0,0);box-shadow: none;margin: 0px;" name="name">              
              <span class="focus-input100" data-placeholder="Full Name"></span>
            </div>

            <div class="wrap-input100 validate-input" id="phone_back" data-validate = "Valid phone is: 01724710671" style="border-image: conic-gradient(#b721ff,#6a7dfe,#21d4fd) 1;">
                <span style="font-family: Poppins-Regular; font-size: 15px; color: #999999; line-height: 1.2; padding-left: 5px;">Phone</span>
              <input type="tel" id="full_phone" readonly="" class="input100" value=""  style="border: none; outline: none;background: rgb(0,0,0,0);box-shadow: none;margin: 0px; font-size: 16px; " name="phone">              
              
            </div>

            <div class="wrap-input100 validate-input" data-validate = "example@mail.com">
              <input type="email"class="input100" :value="old('email')"  style="border: none; outline: none;background: rgb(0,0,0,0);box-shadow: none;margin: 0px;" name="email">              
              <span class="focus-input100" data-placeholder="Email"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Write Current Address">
              <input type="text"class="input100" :value="old('current_address')"  style="border: none; outline: none;background: rgb(0,0,0,0);box-shadow: none;margin: 0px;" name="current_address">         
              <span class="focus-input100" data-placeholder="Current Address"></span>
            </div>
            <div style="display: inline-flex; justify-content: space-around; flex-wrap: wrap; width: 100%; ">
               
                <div style="margin-bottom: 30px; min-width: 192px;" min>
                    <select name="current_city">
                        <option value="" hidden="">Current City</option>
                        @foreach($citis as $key=> $city)
                        <option value="{{$city->id}}">{{$city->city}}</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 30px; min-width: 192px;">
                    <select name="blood_group">
                        <option value="" hidden="">Blood Group</option>
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
                <div style="margin-bottom: 30px; min-width: 192px;">
                    <select name="gender">
                        <option value="" hidden="">Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Other</option>
                    </select>
                </div>
            </div>

            <div class="wrap-input100 validate-input" id='dob_back' data-validate = "Date of Birth">
                <span style="font-family: Poppins-Regular; font-size: 15px; color: #999999; line-height: 1.2; padding-left: 5px;">Date of Birth</span>
                <input type="date"class="input100" id="dateofbarth" :value="old('dob')"  style="border: none; outline: none;background: rgb(0,0,0,0);box-shadow: none;margin: 0px;" name="dob" onchange="dateborder();">
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
              <span class="btn-show-pass">
                <i class="zmdi zmdi-eye"></i>
              </span>
              <input class="input100" type="password" name="password" value="" style="border: none; outline: none;background: rgb(0,0,0,0);box-shadow: none;margin: 0px;">
              <span class="focus-input100" data-placeholder="Password"></span>
            </div>
            
            <div class="wrap-input100 validate-input" data-validate="Enter password again">
              <span class="btn-show-pass">
                <i class="zmdi zmdi-eye"></i>
              </span>
              <input class="input100" type="password" name="password_confirmation" value="" style="border: none; outline: none;background: rgb(0,0,0,0);box-shadow: none;margin: 0px;">
              <span class="focus-input100" data-placeholder="Confirm Password"></span>
            </div>
            <center>
                <span>I agree to the <a href="terms-conditions" style="color:red;">terms of service</a> and <a href="privacy-policy" style="color:red;">privacy policy</a>.</span>
            </center>
            <div class="container-login100-form-btn">
              <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn">
                  Register
                </button>
              </div>
            </div><br>
            <center>
              <div>
                <a href="{{ route('login') }}">Already registered?</a>
              </div>
            </center>
          </form>
        </div>
      </div>
    </div>
<script type="text/javascript">
window.onload=function () {


    if (sessionStorage.getItem('validnumber')) {
        document.getElementById('full_phone').value=sessionStorage.getItem('validnumber');
        //sessionStorage.removeItem('validnumber');
    }

};

function dateborder(){
//number validation check
  if (document.getElementById("dateofbarth").value!='') {
    document.getElementById("dob_back").style.borderImage= 'conic-gradient(#b721ff,#6a7dfe,#21d4fd) 1';
  }
  else{
    document.getElementById("dob_back").style.borderImage= 'none';
    document.getElementById("dob_back").style.borderColor= '#808080';
  }
}
</script>
@endsection
