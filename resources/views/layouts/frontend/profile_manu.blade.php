  <?php
    if (Auth::user()->profile_photo_path) {
       $profile_photo_path=asset('/').Auth::user()->profile_photo_path;
    }
    else{
        $profile_photo_path='https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=7F9CF5&background=EBF4FF';
    }
  ?>
  <div class="utf_user_name"><span><img src="{{$profile_photo_path}}" alt="" style="height: 40px; width: 40px; object-fit: cover;"></span></div>
  <ul>
    <li><a href="{{asset('/')}}dashboard"><i class="sl sl-icon-layers"></i> Dashboard</a></li>
    <li><a href="{{asset('/')}}edit-profile"><i class="sl sl-icon-user"></i> My Profile</a></li>
    @if(Auth::user()->role_id==3)
    <li><a href="{{asset('/')}}my-request"><i class="sl sl-icon-list"></i> My Request</a></li>
    @endif
    <li><a href="{{asset('/')}}blood-request"><i class="sl sl-icon-drop"></i> Blood Request</a></li>
    <li><a href="{{asset('/')}}messages"><i class="sl sl-icon-envelope-open"></i> Messages</a></li>    
    <li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
          <i class="sl sl-icon-power"></i> Logout
        </a>
      </form>
    </li>
  </ul>