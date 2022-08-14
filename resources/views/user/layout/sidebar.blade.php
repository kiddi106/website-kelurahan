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
                <div id="clock" style="text-align: center; color:white" ></div>
		<script type="text/javascript">
		<!--
		function showTime() {
		    var a_p = "";
		    var today = new Date();
		    var curr_hour = today.getHours();
		    var curr_minute = today.getMinutes();
		    var curr_second = today.getSeconds();
		    if (curr_hour < 12) {
		        a_p = "AM";
		    } else {
		        a_p = "PM";
		    }
		    if (curr_hour == 0) {
		        curr_hour = 12;
		    }
		    if (curr_hour > 12) {
		        curr_hour = curr_hour - 12;
		    }
		    curr_hour = checkTime(curr_hour);
		    curr_minute = checkTime(curr_minute);
		    curr_second = checkTime(curr_second);
		 document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
		    }

		function checkTime(i) {
		    if (i < 10) {
		        i = "0" + i;
		    }
		    return i;
		}
		setInterval(showTime, 500);
		//-->
		</script>
            </li>
            <li>
                <a href="{{ route('dashboard') }}">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Dashboard</span>
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


