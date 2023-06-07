
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
@foreach($users as $key=> $user)
  <?php $myid=0; ?>
  @if(Auth::check())
    <?php $myid=Auth::user()->id; ?>
  @endif
  @if($user->id!=$myid)
  @if( time() > strtotime('+18 years', strtotime($user->dob))) 
  <!--donated date 3 month -->
  <?php $last_donated_date="";?>
  @foreach($proves as $key=> $prove)
    @if($prove->donor_id==$user->id)
        <?php $last_donated_date=$prove->donated_date; break;?>
    @endif
  @endforeach
  @if( time() > strtotime('+3 months', strtotime($last_donated_date)))
  <style type="text/css">
    .chat-image{
      background-color: rgb(0,0,0,0)!important; 
      padding: 0px!important;
      height: 50px!important;
      width: 50px;
      border-radius: 50%!important;
      box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 12%), 0 1px 5px 0 rgb(0 0 0 / 20%);
    }
  </style>

<div class="col-lg-4 col-md-12"> 
  <div class="utf_listing_item-container" data-marker-id="2">
    <span class="chat_tag chat-image" title="massage"><img style="cursor: pointer;" class="" src="{{asset('/')}}frontend/images/chat-icon.png" onclick="window.location='/message/chatbox/{{$user->id}}';"></span>
    <?php $user_role=''; ?>
    @if(Auth::check())
      <?php $user_role=Auth::user()->role_id; ?>
    @endif
    @if($user_role!=2) 
    <span class="chat_tag chat-image" title="Blood Request" style="top: 80px;" ><img style="cursor: pointer;" onclick="confirm_request('{{$user->id}}');"  src="{{asset('/')}}frontend/images/blood-request.png"></span>
    @endif
    <div class="utf_listing_item">
      <?php
          if ($user->profile_photo_path) {
             $profile_photo_path=asset('/').$user->profile_photo_path;
          }
          else{
              $profile_photo_path='https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=7F9CF5&background=EBF4FF';
          }
      ?> 
      <img src="{{$profile_photo_path}}" alt="">      
      <div class="utf_listing_item_content">
          <h3>{{$user->name}}</h3>
          <span><i class="sl sl-icon-location"></i> {{$user->current_address}}, {{$user->city}}, Bangladesh</span>
          @if($user->phonestatus==1)
            @if(Auth::check())
            <span><i class="sl sl-icon-phone"></i> {{$user->phone}}</span>
            @else
            <span><i class="sl sl-icon-phone"></i> +8801..(sing-in to see the number)</span>
            @endif
          @endif
          <span><i class="sl sl-icon-drop"></i> Blood Group ({{$user->blood_group}})</span>
          @if($user->gender=='F')
          <span><i class="sl sl-icon-target"></i> Gender: Female</span>
          @elseif($user->gender=='M')
          <span><i class="sl sl-icon-target"></i> Gender: Male</span>
          @else
          <span><i class="sl sl-icon-target"></i> Gender: Other</span>              
          @endif
          <?php $count=0; ?>
          @foreach($proves as $key=> $prove)
            @if($prove->donor_id==$user->id)
              <?php $count++; ?>
            @endif
          @endforeach
          <span><i class="sl sl-icon-emotsmile"></i> Donated ({{$count}}) time</span>
      </div>
    </div>
  </div> 
</div>
<script type="text/javascript">
  function confirm_request(user_id) { 
          alertify.confirm('Blood Request',"<center><h3>Are you sure?</h3>you want to send blood request?<br>Needed Date:<input type='date' id='needed_date' /><center>",
          function(){
            //alertify.success('Ok');
            if (document.getElementById('needed_date').value) {
            window.location.href = '{{asset("/")}}send-blood-request/{{$user->id}}/{{$user->blood_group}}/'+document.getElementById('needed_date').value;
            }
            else{
              alertify.error('Select Needed date');
            }
          },
          function(){
            alertify.error('Cancel');
          });
  }
</script>
@endif
@endif
@endif
@endforeach  
