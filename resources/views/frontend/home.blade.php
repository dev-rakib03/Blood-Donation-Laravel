@extends('layouts.frontend.layout')
@section('title', 'Home')
@section('content')

<div class="search_container_block home_main_search_part main_search_block" data-background-image="{{asset('/')}}frontend/images/city_search_background.jpg">
    <div class="main_inner_search_block">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>Find Your Nearby <span class="typed-words"></span></h2>
            <h4>Donate blood & save life.</h4>
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
            <div class="main_popular_categories">
		          <h3>Or Browse List</h3>	
              <ul class="main_popular_categories_list">               
                <li> 
                  <a href="{{asset('/')}}blood-bank">
                  <div class="utf_box"> 
                    <i class="im im-icon-Home-2" aria-hidden="true"></i>
                    <p>Blood Bank</p>
                  </div>
                  </a> 
				        </li>
				        <li> 
                  <a href="{{asset('/')}}donors">
                  <div class="utf_box"> 
                    <i class="im im-icon-Business-Man" aria-hidden="true"></i>
                    <p>Donners</p>
                  </div>
                  </a> 
				        </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>

<div class="container" id="search_list" style="display: none;">
    <br>
    <br>
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
  
  
  
  <!--<section class="fullwidth_block padding-top-75 padding-bottom-75" data-background-color="#ffffff">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="headline_part centered margin-bottom-50"> Letest Tips & Blog<span>Discover & connect with top-rated local businesses</span></h3>
        </div>
      </div>
      <div class="row"> 
        <div class="col-md-3 col-sm-6 col-xs-12"> <a href="blog_detail_post.html" class="blog_compact_part-container">
          <div class="blog_compact_part"> <img src="{{asset('/')}}frontend/images/blog-compact-post-01.jpg" alt="">
            <div class="blog_compact_part_content">              
        <h3>The Most Popular New top Places Listing</h3>
        <ul class="blog_post_tag_part">
                <li>22 January 2019</li>        
              </ul>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
            </div>
          </div>
          </a> 
    </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12"> <a href="blog_detail_post.html" class="blog_compact_part-container">
          <div class="blog_compact_part"> <img src="{{asset('/')}}frontend/images/blog-compact-post-02.jpg" alt="">
            <div class="blog_compact_part_content">              
              <h3>Greatest Event Places in Listing</h3>
        <ul class="blog_post_tag_part">
                <li>18 January 2019</li>
              </ul>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
            </div>
          </div>
          </a> 
    </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12"> <a href="blog_detail_post.html" class="blog_compact_part-container">
          <div class="blog_compact_part"> <img src="{{asset('/')}}frontend/images/blog-compact-post-03.jpg" alt="">
            <div class="blog_compact_part_content">              
              <h3>Top 15 Greatest Ideas for Health & Body</h3>
        <ul class="blog_post_tag_part">
                <li>10 January 2019</li>
              </ul>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
            </div>
          </div>
          </a> 
    </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12"> <a href="blog_detail_post.html" class="blog_compact_part-container">
          <div class="blog_compact_part"> <img src="{{asset('/')}}frontend/images/blog-compact-post-04.jpg" alt="">
            <div class="blog_compact_part_content">              
              <h3>Top 10 Best Clothing Shops in Sydney</h3>
        <ul class="blog_post_tag_part">
                <li>18 January 2019</li>
              </ul>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
            </div>
          </div>
          </a> 
    </div>        
        <div class="col-md-12 centered_content"> <a href="blog_page.html" class="button border margin-top-20">View More Blog</a> </div>
      </div>
    </div>
  </section>-->
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
    document.getElementById('search_list').style.display='block';
    }
    });
  }
</script>

@endsection
