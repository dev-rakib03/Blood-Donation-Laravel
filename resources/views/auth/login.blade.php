@extends('layouts.frontend.layout')
@section('title', 'Sign In')
@section('content')
<!--phone number country code-->
<link rel="stylesheet" href="{{ asset('/') }}common/phone_number_country/css/intlTelInput.css">
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
          <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
            @csrf
            <span class="login100-form-title">
              Sign In
            </span>
            <div class="wrap-input100 validate-input" id="phone_back" data-validate = "Valid phone is: 01724710671">
              <input hidden="" name="phone" readonly id="full_phone"/>
              <input id="phone" type="tel"class="input100 @error('phone') is-invalid @enderror" :value="old('phone')" placeholder="1724-710671" maxlength="11" style="border: none; outline: none;background: rgb(0,0,0,0);box-shadow: none;margin: 0px;" oninput="this.value=this.value.replace(/[^0-9]/g,''); inputdata();">              
              <span class="focus-input100" data-placeholder="" style=""></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
              <span class="btn-show-pass">
                <i class="zmdi zmdi-eye"></i>
              </span>
              <input class="input100" type="password" name="password" autocomplete="current-password" style="border: none; outline: none;background: rgb(0,0,0,0);box-shadow: none;margin: 0px;">
              <span class="focus-input100" data-placeholder="Password"></span>
            </div>

            <div class="container-login100-form-btn">
              <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn">
                  Login
                </button>
              </div>
            </div>
            <center>
              <div style="display: inline-flex;">
                <div>
                  <input type="checkbox" name="remember" style="width: 15px; background:rgb(0,0,0,0); box-shadow: none; margin: 0px;">
                </div>
                <div>
                  <span style="position: relative; top: 11px;padding-left: 5px;">Remember me</span>
                </div>
              </div>
              <div>
                <a href="{{ route('password.request') }}">Forgot password?</a>
                <br>
                <a href="{{asset('/')}}phone-verify">Don’t have an account? Sign Up</a>
              </div>
            </center>
          </form>
        </div>
      </div>
    </div>
<!--phone number country--Rakibuzzaman-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="{{ asset('/') }}common/phone_number_country/js/intlTelInput.js"></script>

<script type="text/javascript">

  // get the country data from the plugin  
  var countryData = window.intlTelInputGlobals.getCountryData(),
  countryData1 = window.intlTelInputGlobals.getCountryData(),
  input = document.querySelector("#phone"),
  errorMsg = document.querySelector("#error-msg"),
  validMsg = document.querySelector("#valid-msg"),
  sendcode = document.querySelector("#send-code");

// Error messages based on the code returned from getValidationError
var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// Initialise plugin
var iti = window.intlTelInput(input, {
      allowDropdown: false,
      // autoHideDialCode: false,
      autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
       formatOnDisplay: false,
      hiddenInput: "full_number",
      initialCountry: "auto",
        geoIpLookup: function(callback) {
        var elt = document.getElementById('phone'),
            current_value = elt.value;
        elt.value = '';  // unset the value before checking geoip
        $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
        var countryCode = (resp && resp.country) ? resp.country : "";
        callback(countryCode);
            setTimeout(function() {
            elt.value = current_value;  // set value back after geoip is done.
                }, 10);
            });
        },
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
       onlyCountries: ['bd'],
      //placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      separateDialCode: true,
      utilsScript: "{{ asset('/') }}common/phone_number_country/js/utils.js?1603274336113",

});

window.onload=function() {
  document.getElementById("phone").value= iti.getNumber();
};

function inputdata(){
//number validation check
document.getElementById("full_phone").value= iti.getNumber();
  if (document.getElementById("phone").value!='') {
    document.getElementById("phone_back").style.borderImage= 'conic-gradient(#b721ff,#6a7dfe,#21d4fd) 1';
  }
  else{
    document.getElementById("phone_back").style.borderImage= 'none';
    document.getElementById("phone_back").style.borderColor= '#808080';
  }
}

</script>
@endsection

