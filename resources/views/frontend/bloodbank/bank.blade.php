
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" integrity="sha512-QKC1UZ/ZHNgFzVKSAhV5v5j73eeL9EEN289eKAEFaAjgAiobVAnVv/AGuPbXsKl1dNoel3kNr6PYnSiTzVVBCw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="col-lg-4 col-md-12"> 
  <div class="utf_listing_item-container" data-marker-id="2">
    <span class="chat_tag chat-image" title="massage"><img class="" src="{{asset('/')}}frontend/images/chat-icon.png" onclick="window.location='/message/chatbox/{{$user->id}}';" style="cursor: pointer;"></span>
    <?php $user_role=''; ?>
    @if(Auth::check())
      <?php $user_role=Auth::user()->role_id; ?>
    @endif
    @if($user_role!=2)
    <span class="chat_tag chat-image" title="Blood Request" style="top: 80px;"><img onclick="confirm_request('{{$user->id}}');" src="{{asset('/')}}frontend/images/blood-request.png"  style="cursor: pointer;"></span>
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
          @if(Auth::check())
          <span><i class="sl sl-icon-phone"></i> {{$user->phone}}</span>
          @else
          <span><i class="sl sl-icon-phone"></i> +8801..(sing-in to see the number)</span>
          @endif
          <span><i class="sl icon-envelope-letter"></i> {{$user->email}}</span>
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
          var blood_options='<select id="blood_select" name="blood_group"><option value="" hidden="">Blood Group</option><option value="A+">A RhD positive (A+)</option><option value="A-">A RhD negative (A-)</option><option value="B+">B RhD positive (B+)</option><option value="B-">B RhD negative (B-)</option><option value="O+">O RhD positive (O+)</option><option value="O-">O RhD negative (O-)</option><option value="AB+">AB RhD positive (AB+)</option><option value="AB-">AB RhD negative (AB-)</option></select>';

          alertify.confirm('Blood Request',"<center><h3>Are you sure?</h3>you want to send blood request?<br>Needed Date:<input type='date' id='needed_date' /><br>"+blood_options+"<center>",
          function(){
            //alertify.success('Ok');
            if (document.getElementById('needed_date').value) {
              if (document.getElementById('blood_select').value) {
                window.location.href = '{{asset("/")}}send-blood-request/{{$user->id}}/'+document.getElementById('blood_select').value+'/'+document.getElementById('needed_date').value;
              }
              else{
                alertify.error('Select Blood Group');
              }   
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
@endforeach   
