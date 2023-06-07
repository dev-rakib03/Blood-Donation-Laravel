<!DOCTYPE html>
<html lang="en">
<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin - @yield('title')</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('/')}}admin-assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('/')}}admin-assets/css/style.css">
  <link rel="stylesheet" href="{{asset('/')}}admin-assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('/')}}admin-assets/css/custom.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('/')}}frontend/images/favicon.png">
  @PWA
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>

          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          
          <!--notification-->
          <!--<li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                  </span> <span class="dropdown-item-desc"> Template update is
                    available now! <span class="time">2 Min
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
												fa-user"></i>
                  </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                      Sugiharto</b> are now friends <span class="time">10 Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i
                      class="fas
												fa-check"></i>
                  </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                    moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                      Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                      class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc"> Low disk space. Let's
                    clean it! <span class="time">17 Hours Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Welcome to Otika
                    template! <span class="time">Yesterday</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>-->
          <!--end notification-->

          <!--profile-->
          <?php
            $imahepath=Auth::user()->profile_photo_path;            
            $imagename=Auth::user()->name;
            if ($imahepath) {
               $profile_photo_path=asset('/').$imahepath;
            }
            else{
                $profile_photo_path='https://ui-avatars.com/api/?name='.urlencode($imagename).'&color=7F9CF5&background=EBF4FF';
            }
          ?>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{$profile_photo_path}}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello {{Auth::user()->name}}</div>
              <a href="{{asset('/')}}edit-profile" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a>
              <a href="{{asset('/')}}change-password" class="dropdown-item has-icon"> <i class="fas fa-key"></i>
                Change Password
              </a>
              <div class="dropdown-divider"></div>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
                </a>
              </form>
            </div>
          </li>
          <!--end profile-->
        </ul>
      </nav>

      <!--side bar-->
      <?php
        $dashboard=substr(strtok($_SERVER['REQUEST_URI'], '?'), 0, 16);
        $all_admin=substr(strtok($_SERVER['REQUEST_URI'], '?'), 0, 16);
        $all_users=substr(strtok($_SERVER['REQUEST_URI'], '?'), 0, 16);
        $all_bloodbank=substr(strtok($_SERVER['REQUEST_URI'], '?'), 0, 20);
        $domation_proves=substr(strtok($_SERVER['REQUEST_URI'], '?'), 0, 22);
        $pwa=substr(strtok($_SERVER['REQUEST_URI'], '?'), 0, 4);
      ?>

      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{asset('/')}}"> <img alt="image" src="{{asset('/')}}frontend/images/favicon.png" class="header-logo" /> <span
                class="logo-name"><span style="color: red;">Blood</span>Tent</span>
            </a>
          </div>
          <ul class="sidebar-menu">

            <!--main-->
            <li class="menu-header">Main</li>

            <li class="<?= ($dashboard == '/admin/dashboard') ? 'active':''; ?>">
              <a href="{{asset('/')}}admin/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <!--users-->
            <li class="menu-header">Users</li>

            @if(Auth::user()->role_id==1)
            <li class="<?= ($all_admin == '/admin/all-admin') ? 'active':''; ?>">
              <a class="nav-link" href="{{asset('/')}}admin/all-admin"><i data-feather="user"></i><span>All Admin</span>
              </a>
            </li>
            @endif
            
            <li class="<?= ($all_users == '/admin/all-users') ? 'active':''; ?>">
              <a class="nav-link" href="{{asset('/')}}admin/all-users"><i data-feather="users"></i><span>All Users</span>
              </a>
            </li>

            <li class="<?= ($all_bloodbank == '/admin/all-bloodbank') ? 'active':''; ?>">
              <a class="nav-link" href="{{asset('/')}}admin/all-bloodbank"><i data-feather="home"></i><span>All Blood Bank</span>
              </a>
            </li>


            <!--suport-->
            <li class="menu-header">Suport</li>

            <li class="<?= ($domation_proves == '/admin/donation-proves') ? 'active':''; ?>">
              <a class="nav-link" href="{{asset('/')}}admin/donation-proves"><i data-feather="droplet"></i><span>Donation Proves</span>
              </a>
            </li>

            <li>
              <a class="nav-link" href="{{asset('/')}}messages"><i data-feather="mail"></i><span>Message</span>
              </a>
            </li>

            @if(Auth::user()->role_id==1)
            <!--suport-->
            <li class="menu-header">Settings</li>

            <li  class="<?= ($pwa == '/pwa') ? 'active':''; ?>">
              <a class="nav-link" href="{{asset('/')}}pwa"><i data-feather="command"></i><span>PWA</span>
              </a>
            </li>
            @endif

          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @if(session()->exists('success'))
            <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
                {{ session()->get('success') }}{{ session()->forget('success') }}
              </div>
            </div>
          @endif
            
           @if(session()->exists('danger'))
            <div class="alert alert-danger alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
                {{ session()->get('danger') }}{{ session()->forget('danger') }}
              </div>
            </div>
          @endif

            @yield('content')
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="https://boraxip.com" target="_blank">BoraxIp</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('/')}}admin-assets/js/app.min.js"></script>
  <!-- JS Libraies -->

  @if( substr(strtok($_SERVER['REQUEST_URI'], '?'), 0, 17) == '/admin/prove-view')
  <script src="{{asset('/')}}admin-assets/bundles/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="{{asset('/')}}admin-assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  @endif

  @if($all_admin == '/admin/all-admin' || $all_users == '/admin/all-users' || $all_bloodbank == '/admin/all-bloodbank' || $domation_proves == '/admin/donation-proves')
  <script src="{{asset('/')}}admin-assets/bundles/datatables/datatables.min.js"></script>
  <script src="{{asset('/')}}admin-assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('/')}}admin-assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  @endif
  <!-- Page Specific JS File -->
  @if($all_admin == '/admin/all-admin' || $all_users == '/admin/all-users' || $all_bloodbank == '/admin/all-bloodbank' || $domation_proves == '/admin/donation-proves')
  <script src="{{asset('/')}}admin-assets/js/page/datatables.js"></script>
  @endif
  <!-- Template JS File -->
  <script src="{{asset('/')}}admin-assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="{{asset('/')}}admin-assets/js/custom.js"></script>
  <!--user active-->
<script type="text/javascript">
  function user_active_value() {
    $.ajax({
      type : 'get',
      url : '{{URL::to("make-active-user")}}',
      success:function(data){
        
      }
    });
  }

  user_active_value();
</script>
</body>
<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
</html>