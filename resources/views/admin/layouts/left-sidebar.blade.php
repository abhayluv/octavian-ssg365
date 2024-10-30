<!-- <div class="navbar-icon"><a href="#!" class="menu-toggle desk-none"><img class="nav-bar-icon" src="../images/mobile-bav-icon.svg" alt=""><img class="navclose-icon" src="../images/close-icon.svg" alt=""></a></div> -->
<div class="navbar-icon"><a href="#!" class="menu-toggle desk-none"><img class="navclose-icon" src="../images/close-icon.svg" alt=""></a></div>
<div class="leftsecpos staff-leftbar-panel">
   <div class="left-top-sec">
      <div class="account-name">
         <div class="account-info">
            <div class="account-holder">
               <img src="{{asset('images/octavian-365-white.png')}}" alt="" />
            </div>
            <!-- <div class="switch-acc"><img src="../images/switch.arrow.svg" alt="" /></div> -->
         </div>
      </div>
      <!-- <div class="search-form dark-inp"  data-bs-toggle="modal" data-bs-target="#search-modal"><input type="text" class="form-control form-input search-dark-icon" placeholder="Search"></div> -->
      <div class="left-navbar">
         <ul>
            <li class="{{ (Request::segment(1) == 'admin' && Request::segment(2) == 'dashboard') ? 'active' : '' }}">
               <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('images/bar-chart-square.svg')}}" alt=""> Dashboard</a>
            </li>
            <li class="{{ (Request::segment(1) == 'admin' && Request::segment(2) == 'manage_services') ? 'active' : '' }}">
               <a href="{{ route('admin.manage_service.index') }}"><img src="{{ asset('images/setting-icons.svg')}}" alt=""> {{ __('Manage Service')}}</a>
            </li>
            <li class="{{ (Request::segment(1) == 'admin' && Request::segment(2) == 'sia_licences') ? 'active' : '' }}">
               <a href="{{ route('admin.sia_licence.index') }}"><img src="{{ asset('images/setting-icons.svg')}}" alt=""> {{ __('Manage Sia Licence')}}</a>
            </li>
            <li class="{{ (Request::segment(1) == 'admin' && (Request::segment(2) == 'general_settings' || Request::segment(2) == 'intro_screen')) ? 'active' : '' }}">
               <div class="sidebar">
                  <div class="dropdown">
                     <a href="#"><img src="{{ asset('images/setting-icons.svg')}}" alt="" style="vertical-align: middle;"> {{ __('Settings')}}</a>
                     <div class="dropdown-content">
                        <a href="{{ route('admin.general_setting.index') }}">General Settings</a>
                        <a href="{{ route('admin.intro_screen.index') }}">Intro Screen</a>
                     </div>
                  </div>
               </div>
            </li>
            <!-- <li>
               <a href="#"><img src="{{ asset('images/users-customer.svg')}}" alt=""> Customers</a>
            </li>
            <li>
               <a href="#"><img src="{{ asset('images/camping-icon.svg')}}" alt=""> Campaigns</a>
            </li>
            <li>
               <a href="#"><img src="{{ asset('images/projects.svg')}}" alt=""> Projects</a>
            </li>
            <li>
               <a href="#"><img src="{{ asset('images/billing-icon.svg')}}" alt=""> Billing</a>
            </li>
            <li>
               <a href="#"><img src="{{ asset('images/tasks-icon.svg')}}" alt=""> Tasks</a>
            </li>
            <li>
               <a href="#"><img src="{{ asset('images/appointments-icon.svg')}}" alt=""> Appointments</a>
            </li>
            <li>
               <a href="#"><img src="{{ asset('images/support-icon.svg')}}" alt=""> Support</a>
            </li> -->
         </ul>
      </div>
   </div>
   <div class="leftftmenu">
      <div class="left-bottom-box">
         <!-- <div class="left-navbar ft-bot-navbar">
            <ul>
               <li>
                  <a class="support-box" href="#"><img src="{{ asset('images/admin-over-view.svg')}}" alt=""> Admin overview</a>
               </li>
               <li>
                  <a href="#"><img src="{{ asset('images/gray-bell.svg')}}" alt=""> Notifications</a>
               </li>

            </ul>
         </div> -->
         <div class="userbox">
            <div class="userbox-flex">
               <div class="userbox-info">
                  <img src="{{ asset('images/user-logout-icon.svg')}}" />
                  <div class="user-meta">
                     <h3>{{ Auth::user()->name }}</h3>
                     <span>{{ Auth::user()->email }}</span>
                  </div>
               </div>
               <div class="userinfo-dots"><a href="javascript:void(0);"><img src="{{ asset('images/three-dots.svg')}}" alt=""></a></div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="userprofile-logout">
   <ul>
      <li><a href="#"><img src="{{ asset('images/user-icon.svg')}}" alt=""> Profile</a></li>
      <li><a href="{{ route('admin.logout')}}"><img src="{{ asset('images/logout-icon.svg')}}" alt=""> Logout</a></li>
   </ul>
</div>