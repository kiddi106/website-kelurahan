@extends('layouts.app')

@section('content')
<section id="header">
    <div class="header container">
    <div class="nav-bar">
        <div class="brand">
        <a href="#hero">
            <!-- <img src="mitracomm-ekasarana-squarelogo-1582282615614-removebg-preview.png" alt="" style="display: flex; width: 70px; height: 70px;"> -->
            <h1><span>M</span>itracomm <span>E</span>kasarana</h1>
        </a>
        </div>
        <div class="nav-list">
        <div class="hamburger">
            <div class="bar"></div>
        </div>
        <ul>
            <li><a href="#hero" data-after="Home">Home</a></li>
            <li><a href="#services" data-after="News">News</a></li>
            {{-- <li><a href="#projects" data-after="Projects">Survey</a></li> --}}
            <li><a href="#about" data-after="About">About</a></li>
            <li><a href="#contact" data-after="Contact">Contact</a></li>
            @guest
            @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" data-after="Login">{{ __('Login') }}</a>
                        </li>
                    @endif
            @else
            <li>
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('logout') }}" role="button" data-after="Logout"
                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </div>
            </li>   
            @endguest
        </ul>
        </div>
    </div>
    </div>
</section>
<section id="hero">
    <div class="hero container">
      <div>
        @can('admin')
            <h1>Hello, Admin <span></span></h1>
            <h1>Thanks For Your Support <span></span></h1>
            <h1>{{ Auth::user()->name }}<span></span></h1>
            <a href="{{ route('dashboard') }}" type="button" class="cta">Dashboard</a>

        @elsecan('warga')
            
        <h1>Thanks For Coming  </h1>
        <h1>on website Our Facilities</h1>
        <h1>Give me your rate for our service</h1>
        @foreach ($model->reverse() as $mdl => $value)
        <a href="land-page/{{ $value->slug }}" class="cta"> Take Survey </a>
          @if ($loop->index == 0)@break @endif 
        @endforeach
        @else   
            @if ($jawab)
                <h1>You Have Take It Survey  <span></span></h1>
                <h1>Thanks For Your Support <span></span></h1>
                <h1>{{ Auth::user()->name }}  <span></span></h1>

                <a href="{{ route('dashboard-user') }}" type="button" class="cta">Dashboard</a>
                
                    {{-- <a href="land-page/{{ $value->slug }}" class="cta"> Take Survey </a> --}}
                
                
            @else
                @foreach ($model->reverse() as $mdl => $value)
                    <h1>Welcome<span></span></h1>
                    <h1>To Web Our Services <span></span></h1>
                    <h1>{{ Auth::user()->name }}  <span></span></h1>
                    <a href="land-page/{{ $value->slug }}" class="cta"> Take Survey </a>
                    <a href="{{ route('dashboard-user') }}" type="button" class="cta">Dashboard</a>
                    
                    @if ($loop->index == 0)@break @endif 
                @endforeach
            @endif
            
        @endcan
        
    </div>
    </div>
  </section>
  <!-- End Hero Section  -->

  <!-- Service Section -->
  <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Ne<span>w</span>s</h1>
        <p>Berita Terkait & Terkini Mitracomm Ekasarana </p>
      </div>
      <div class="service-bottom">
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Maintanance</h2>
          <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p> -->
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Maintanance</h2>
          <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p> -->
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Maintanance</h2>
          <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p> -->
        </div>
        <div class="service-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/services.png" /></div>
          <h2>Maintanance</h2>
          <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis debitis rerum, magni voluptatem sed
            architecto placeat beatae tenetur officia quod</p> -->
        </div>
      </div>
    </div>
  </section>
  <!-- End Service Section -->

  <!-- Survey Section -->
  <section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Recent <span>Survey</span></h1>
      </div>
      <div class="all-projects">
          @foreach ($model->reverse() as $mdl => $value)
          <div class="project-item">
            <div class="project-info">
              <a href="">
                <h1>{{ $value->title }}</h1>
                <h2></h2>
                <p>{{ $value->description }}</p>
              </a>
              <a href="land-page/{{ $value->slug }}" class="cta"> Take Survey </a>
            </div>
            <div class="project-img">
              <img src="{{ asset('assets/img/img-1.png') }}" alt="img">
            </div>
          </div> 
          @if ($loop->index == 1)@break @endif
          @endforeach
      </div>
      <div class="button">
        <a href="{{ route('land-page') }}" class="cta"> All Survey </a>
      </div>
    </div>
  </section> --}} 
  <!-- End Survey Section -->

  <!-- About Section -->
  <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="{{ asset('assets/img/career-2-removebg-preview.png') }}" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">About <span>MBPS</span></h1>
        <h2>Mitracomm Ekasarana</h2>
        <p>Are you looking for the right partner to transform your business? You have come to the right place! Our customers’ success is our success.

            MitraComm Business Process Services was established in 2007 as a business process services provider. Now we have more than 150 professionals in the field, ± 8.000 NP staffs, and contact center locations with 4.000 seating capacity.
            
            MitraComm brings the best people, processes, technologies, and premises to deliver a consistent and exceptional service.
            
            Commitment to maintain our Service as implemented in ISO 9001:2015 since 2008.
            
            MitraComm are striving towards the requirements of ISO 27001:2013 as our commitment to maintaining the confidentiality, integrity and availability of information assets for our service business.</p>
        <a href="https://www.mitracomm.com/" class="cta">More Info</a>
      </div>
    </div>
  </section>
  <!-- End About Section -->

  <!-- Contact Section -->
  <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Contact <span>info</span></h1>
      </div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2>+6221 2555 6168</h2>
            <h2>+6221 573 1313</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>marketing@phintraco.com</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>The East Tower, Jl. DR. Ide Anak Agung Gde Agung Kav. E.3.2 No.1 Kawasan Mega Kuningan Jakarta 12950, Indonesia</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact Section -->

  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <div class="brand">
        <h1><span>M</span>itracomm <span>E</span>kasarana</h1>
      </div>
      <h2>Your Answer Is The Solution For Us</h2>
      <div class="social-icon">
        <div class="social-item">
          <a href="https://www.facebook.com/PhintracoGroup/"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="https://www.instagram.com/phintraco_group/"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
        </div>
        <div class="social-item">
          <a href="https://www.linkedin.com/company/phintracogroup/"><img src="https://img.icons8.com/bubbles/100/000000/link.png" /></a>
        </div>
        <div class="social-item">
          <a href="https://www.youtube.com/PhintracoGroup"><img src="https://img.icons8.com/bubbles/100/000000/youtube.png" /></a>
        </div>
      </div>
      <p>Copyright © 2022 PT Mitracomm Ekasarana. All rights reserved</p>
    </div>
  </section>
  <!-- End Footer -->
{{-- <div class="container">
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">Generate more leads with a professional landing page!</h1>
                        <!-- Signup form-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->
                            <div class="row">
                                <div class="col">
                                    <input class="form-control form-control-lg" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                                    <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                                    <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                                </div>
                                <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    <p>To activate this form, sign up at</p>
                                    <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
