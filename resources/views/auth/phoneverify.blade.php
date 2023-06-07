@extends('layouts.frontend.layout')
@section('title', 'Verify')
@section('content') 
<!--phone number country code-->
<link rel="stylesheet" href="{{ asset('/') }}common/phone_number_country/css/intlTelInput.css">
    <div class="limiter">      
      <div class="container-login100">
        <div class="wrap-login100">
            <span class="login100-form-title">
              Verify
            </span><br>
            <div class="wrap-input100 validate-input" id="phone_back" data-validate = "Valid phone is: 01724710671" style="margin-bottom: 0px;">
              <input hidden="" name="phone" readonly id="full_phone"/>
              <input id="phone" type="tel"class="input100 @error('phone') is-invalid @enderror" :value="old('phone')" placeholder="1724-710671" maxlength="11" style="border: none;font-size: 16px; outline: none;background: rgb(0,0,0,0);box-shadow: none;margin: 0px;" oninput="this.value=this.value.replace(/[^0-9]/g,''); inputdata();"> 
            </div>
            <style type="text/css">
                .hide{display: none;} 
                #vCode,#send_again{ display: none;  }
                #s_o_timer{
                  padding: 5px;
                  width:40px;
                  height: 40px;
                  display: block;
                  font-size: 20px;
                  border: 2px solid lightblue;
                  border-radius: 50%;
                  color: lightblue;
                  font-style: bold;
                }
                .one_digit_otp{
                  width: 40px;
                  height: 40px;
                  font-size: 20px;
                  text-align: center;
                }

              </style>
              <span id="valid-msg" class="hide" style="color: #34A853;">✓ Valid</span>
              <span id="error-msg" class="hide" style="color: #EA4335;"></span>
            <!--recaptcha-->
            <center>
              <div id="recaptcha-container" style="padding-top: 10px; padding-bottom: 10px;"></div>
              <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button id="send-code" class="login100-form-btn hide" onclick="phoneAuth();">
                    Get OTP
                  </button>
                </div>
              </div>
            </center>

            <div id="vCode" >
              <center>
                <div class="mt-4" style="display: inline-flex;">
                    <input id="verificationCode1" class="one_digit_otp" type="text" maxlength="1" oninput="codeverify();" placeholder="-" />
                    <input id="verificationCode2" class="one_digit_otp" type="text" maxlength="1" oninput="codeverify();" placeholder="-" />
                    <input id="verificationCode3" class="one_digit_otp" type="text" maxlength="1" oninput="codeverify();" placeholder="-" />
                    <input id="verificationCode4" class="one_digit_otp" type="text" maxlength="1" oninput="codeverify();" placeholder="-" />
                    <input id="verificationCode5" class="one_digit_otp" type="text" maxlength="1" oninput="codeverify();" placeholder="-" />
                    <input id="verificationCode6" class="one_digit_otp" type="text" maxlength="1" oninput="codeverify();" placeholder="-" />
                </div>
                <br>
                
                  <span id="s_o_timer"></span>
                  <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                      <div class="login100-form-bgbtn"></div>
                      <button id="send_again" class="login100-form-btn"  onClick="window.location.reload();">
                        Send Again
                      </button>
                    </div>
                  </div>
                </center>
                
            </div>

            <center>
              <div>
                <a href="{{ route('login') }}">Already registered?</a>
              </div>
            </center>
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
       //autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
       formatOnDisplay: false,
      hiddenInput: "full_number",
      /*initialCountry: "auto",
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
        },*/
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      onlyCountries: ['bd'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      separateDialCode: true,
      utilsScript: "{{ asset('/') }}common/phone_number_country/js/utils.js?1603274336113"
});



//number validation check

var reset = function() {
    input.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
    sendcode.classList.add("hide");
    document.getElementById("full_phone").value= iti.getNumber();
};

// Validate on blur event
input.addEventListener('blur', function() {
    reset();
    if(input.value.trim()){
        if(iti.isValidNumber()){
            validMsg.classList.remove("hide");
            sendcode.classList.remove("hide");
            document.getElementById("full_phone").value= iti.getNumber();
        }else{
            input.classList.add("error");
            var errorCode = iti.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
        }
    }
});

// Reset on keyup/change event
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);
</script>

<!--Send otp-->

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->


<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyDGhd-W_anzFcGB3bKnb6PbJHDVhhNWZJU",
    authDomain: "bloodtent.firebaseapp.com",
    projectId: "bloodtent",
    storageBucket: "bloodtent.appspot.com",
    messagingSenderId: "515201593934",
    appId: "1:515201593934:web:8c62a1477961f87240491f",
    measurementId: "G-6JNPSTG8YK"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

window.onload=function () {
  render();
};
function render() {
    window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}
function phoneAuth() {
    //get the number
    var number=document.getElementById('full_phone').value;
    //phone number authentication function of firebase
    //it takes two parameter first one is number,,,second one is recaptcha
    firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
        //s is in lowercase
        window.confirmationResult=confirmationResult;
        coderesult=confirmationResult;
        console.log(coderesult);
        

        //if msg sent successfully
		//alert("Message sent");
		document.getElementById('recaptcha-container').style.display='none';
		document.getElementById('send-code').style.display='none';
		document.getElementById('vCode').style.display='block';
		document.getElementById('phone').readOnly = true;

		//start timer
		var fiveMinutes = 30,
        display = document.querySelector('#s_o_timer');
    	startTimer(fiveMinutes, display);

    }).catch(function (error) {
        alert(error.message);
    });
}
function codeverify() {



		var code=
		document.getElementById('verificationCode1').value+
		document.getElementById('verificationCode2').value+
		document.getElementById('verificationCode3').value+
		document.getElementById('verificationCode4').value+
		document.getElementById('verificationCode5').value+
		document.getElementById('verificationCode6').value;

    if (code.length==6) {
    	coderesult.confirm(code).then(function (result) {

    		var validnumber=document.getElementById('full_phone').value;

    		sessionStorage.setItem('validnumber',validnumber);

    		//After Successfully Verify
    	    //alert("Successfully registered");
    	    let url = "{{ route('register') }}";
    		document.location.href=url;
    		
    	    var user=result.user;
    	    console.log(user);
    	}).catch(function (error) {
    	    alert(error.message);
    	});
	}

}

//timer
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = seconds;

        if (--timer < 0) {            
            document.getElementById('s_o_timer').style.display='none';
            document.getElementById('send_again').style.display='block';
            timer = duration;
        }
    }, 1000);
}


$(".one_digit_otp").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.one_digit_otp').focus();
    }
});

 function inputdata() {
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