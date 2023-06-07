@extends('layouts.frontend.layout')
@section('title', 'Donors')
@section('content')

	<div style="margin-bottom: 20px;">
	  <div class="container">
		<div class="row">
		  <div class="col-md-12">
			<div class="main_input_search_part">
			  <div class="main_input_search_part_item intro-search-field">
				  <select class="selectpicker default" data-live-search="true" id="search_city" name="city" data-selected-text-format="count" data-size="7" title="Select Location">
          @foreach($citis as $key=> $city)
					<option value="{{$city->id}}">{{$city->city}}</option>
          @endforeach
				  </select>
			  </div>
              <div class="main_input_search_part_item intro-search-field">
                <select data-placeholder="All Categories" class="selectpicker default" id="search_blood_group" name="blood_group" title="Blood Group" data-live-search="true" data-selected-text-format="count" data-size="7">
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
			  <button class="button" onclick="search()">Search</button>
			</div>
		  </div>
		</div>
	  </div>
	</div>


  <div class="container">
    <div class="row">
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	  	<div class="col-md-12" id="post-data">
        	<!--show donor-->
      		@include('frontend.donors.donor')
      	</div>
	    <div class="ajax-load text-center" style="display:none">
	      <p><img src="{{asset('/')}}frontend/images/preloader.gif">Loading More post</p>
	    </div>
    </div>
  </div>

<!--scroll loading-->
<script type="text/javascript">
   function loadMoreData(page)
    {
      $.ajax({
         url:'?page=' + page,
         type:'get',
         beforeSend: function()
         {
            $(".ajax-load").show();
         }
      })
      .done(function(data){
         if(data.html == ""){
            $('.ajax-load').html("No more Donors Found!");
            return;
         }
         $('.ajax-load').hide();
         $("#post-data").append(data.html);
      })
      // Call back function
      .fail(function(jqXHR,ajaxOptions,thrownError){
         alert("Server not responding.....");
      });
 
    }
   //function for Scroll Event
   var page =1;
   $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() >= $(document).height()){
         page++;
         loadMoreData(page);
      }
   });
</script>
<script type="text/javascript">
  //search--------------------------------------------------
  function search() {
    var city=document.getElementById('search_city').value;
    var blood_group=document.getElementById('search_blood_group').value;

    $.ajax({
    type : 'get',
    url : '{{URL::to("donor-city-search")}}',
    data:{'city':city,
          'blood_group':blood_group
        },
    success:function(data){
    $("#post-data").html(data.cityoutput);
    }
    });
  }
</script>
@endsection