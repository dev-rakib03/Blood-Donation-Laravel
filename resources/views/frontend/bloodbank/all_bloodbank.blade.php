@extends('layouts.frontend.layout')
@section('title', 'Blood Bank')
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
      		@include('frontend.bloodbank.bank')
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
            $('.ajax-load').html("No more Blood Bank Found!");
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

    $.ajax({
    type : 'get',
    url : '{{URL::to("blood-bank-search")}}',
    data:{'city':city},
    success:function(data){
    $("#post-data").html(data.cityoutput);
    }
    });
  }
</script>
@endsection