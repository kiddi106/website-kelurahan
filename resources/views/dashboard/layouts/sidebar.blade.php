  {{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('survey-list') ? 'active' : '' }}" aria-current="page" href="{{ route('survey-list') }}">
            <span data-feather="airplay"></span>
            All Survey
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="">
            <span data-feather="file-text"></span>
            My Project
          </a>
        </li>
      </ul>        

<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
  <span>Administrator</span>
</h6>
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link {{ Request::is('survey-list-report') ? 'active' : '' }}" href="{{ route('survey-list-report') }}">
      <span data-feather="grid"></span>
      Survey Report
    </a>
  </li>
</ul>
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="">
      <span data-feather="grid"></span>
      Add User
    </a>
  </li>
</ul>


    </div>
  </nav> --}}

  <div class="container">
    <div class="navigation">
      
        <ul>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="desktop-outline"></ion-icon></span>
                    <span class="title">Survey Management</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('survey-list') }}">
                    <span class="icon"><ion-icon name="file-tray-stacked-outline"></ion-icon></span>
                    <span class="title">Survey</span>
                </a>
            </li>
            <li>
              <a href="{{ route('user.index') }}">
                  <span class="icon"><ion-icon name="people-outline"></ion-icon></ion-icon></span>
                  <span class="title">User</span>
              </a>
          </li>
            <li>
                <a href="{{ route('survey-list-report') }}">
                    <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                    <span class="title">Report</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                    <span class="title">Settings</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></ion-icon></span>
                    <span class="title">Sign Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </li>
        </ul>
      
      </div>
  </div> 


