<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Plaibrary</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('grandcss/css/bootstrap.min.css')}}" >
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="../grandcss/fonts/line-icons.css">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="../grandcss/css/slicknav.css">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="../grandcss/css/nivo-lightbox.css" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="../grandcss/css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="../grandcss/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="../grandcss/css/responsive.css">

    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <!-- <link rel="stylesheet" type="text/css" href="../logins/css/reset.css"> --> <!-- CSS reset -->
    <link rel="stylesheet" type="text/css" href="../logins/css/style.css"> <!-- Resource style -->
    <!-- <link rel="stylesheet" type="text/css" href="../logins/css/demo.css"> --> <!-- Demo style -->

  </head>
  <body>

    <!-- <div class="modal fade " id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content"> 
            <div class="modal-body">
             
            <div class="login-box">
              <form class="login-form" action="login" method="POST">
                {{ csrf_field() }} 
                <div class="form-group"> 
                  <input class="form-control" type="text" placeholder="Email" name="email" style="text-transform: lowercase;">
                </div>
                <div class="form-group"> 
                  <input class="form-control" type="password" placeholder="Password" name="password">
                </div> 
                <div class="form-group btn-container">
                  <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                </div>
              </form>
            </div> 

            </div>
          </div>
        </div>
    </div> -->


            <div class="cd-signin-modal__block js-signin-modal-block" data-type="reset"> <!-- reset password form -->
              <p class="cd-signin-modal__message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

              <form class="cd-signin-modal__form">
                <p class="cd-signin-modal__fieldset">
                  <label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="reset-email">E-mail</label>
                  <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="reset-email" type="email" placeholder="E-mail">
                  <span class="cd-signin-modal__error">Error message here!</span>
                </p>

                <p class="cd-signin-modal__fieldset">
                  <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding" type="submit" value="Reset password">
                </p>
              </form>

              <p class="cd-signin-modal__bottom-message js-signin-modal-trigger"><a href="#0" data-signin="login">Back to log-in</a></p>
            </div> <!-- cd-signin-modal__block -->
            <a href="#0" class="cd-signin-modal__close js-close">Close</a>
          </div> <!-- cd-signin-modal__container -->
        </div> <!-- cd-signin-modal -->

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar js-main-nav">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
              <span class="icon-menu"></span>
            </button>
            <a href="/" class="navbar-brand"><h2>PLAIBRARY</h2><!-- <img src="assets/img/logo.png" alt=""> --></a>
          </div>
          
          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto w-100 justify-content-end cd-main-nav__list js-signin-modal-trigger">
              <li class="nav-item active">
                <a class="nav-link" href="#header-wrap">
                  Home
                </a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="/">
                 Profile
                </a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); 
                 document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
              </li> 
            </ul>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
          <li>
            <a class="page-scrool" href="#header-wrap">Book</a>
          </li>
          <li>
            <a class="page-scrool" href="#about">Affiliate</a>
          </li>
          <li>
             <a class="page-scroll" href="#" data-toggle="modal" data-signin="login">Log In</a>
          </li>
        </ul>
        <!-- Mobile Menu End -->

      </nav>
      <!-- Navbar End -->

      <!-- Main Carousel Section Start -->
      <div id="main-slide" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#main-slide" data-slide-to="0" class="active"></li>
          <li data-target="#main-slide" data-slide-to="1"></li>
          <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('grandcss/img/slider/bookslide3.jpg')}}" alt="First slide">
            <div class="carousel-caption d-md-block">
              <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Library</p>
              <h1 class="wow fadeInDown heading" data-wow-delay=".4s">To build up a library is to create a life. It's never just a random collection of books.</h1>
              <!-- <a href="#" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Get Ticket</a> -->
              <a href="#" class="fadeInRight wow btn btn-border btn-lg" data-wow-delay=".6s">Explore More</a>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('grandcss/img/slider/bookslide2.jpg')}}" alt="Second slide">
            <div class="carousel-caption d-md-block">
              <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Library</p>
              <h1 class="wow bounceIn heading" data-wow-delay=".7s">A library is a place where you learn what teachers were afraid to teach you.</h1>
              <a href="#" class="fadeInUp wow btn btn-border btn-lg" data-wow-delay=".8s">Learn More</a>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('grandcss/img/slider/bookslide1.jpg')}}" alt="Third slide">
            <div class="carousel-caption d-md-block">
              <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Library</p>
              <h1 class="wow fadeInUp heading" data-wow-delay=".6s">A library is not a luxury but one of the necessities of life.</h1>
              <a href="#" class="fadeInUp wow btn btn-common btn-lg" data-wow-delay=".8s">Explore</a>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
          <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
          <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- Main Carousel Section End -->

    </header>
    <!-- Header Area wrapper End -->

    <!-- Schedule Section Start -->
    <section id="schedules" class="schedule section-padding">


      @include('admin.includes.success')
      @include('admin.includes.error')
      <div class="row">
      <div class="col-md-12">
      <div class="tile">
      <div class="container">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile Information</a>
                  </li>
                </ul>

      <div class="tab-content" id="myTabContent"> 
          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <br>
            <form  action="{{ route('student.profile.update')}}" method="post" enctype="">
               @csrf
                @method('PATCH')

            <div class="row">

              <div class="col-6">
                 <h4> Basic Info</h4>


                 <div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Full Name</span>
                    </div>
                  
                    <input name="name" type="text" class="form-control" placeholder="" value="{{$student->name}}" >
                  </div>
                  </div>

                  <br><div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Sex</span>
                    </div>
                    <input name="gender" class="form-control" style="margin-right: 10px" value="{{$student->profile->gender ?? ''}}" >

                    <div class="input-group-prepend">
                          <span class="input-group-text">Civil Status</span>
                    </div>
                    <input name="civil" class="form-control" value="{{$student->profile->civil ?? ' '}}" >
                    

                  </div>
                  </div>
                  
                  <br><div class="form-row">
                  <div class="input-group">
                    <div class="input-group-prepend">
                          <span class="input-group-text">Birthdate</span>
                    </div>
                    <input type="text" class="form-control" id="datepickerprofile" name="birthdate" value="{{$student->profile->birthdate ?? ''}}" > 
                  </div>
                  </div>

                  
                  <br><div class="form-row">
                  <div class="input-group">
                      <div class="input-group-prepend">
                            <span class="input-group-text">Address</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Address" name="address" value="{{$student->profile->address ?? ''}}" > 
                  </div>
                  </div>

                    <br><div class="form-row">
                    <div class="input-group">
                      <div class="input-group-prepend">
                            <span class="input-group-text">Mobile Number</span>
                      </div>
                      <input name="contact_num" type="text" class="form-control" value="{{$student->profile->contact_num ?? ''}}" > 
                    </div>
                    </div>
                  </div>
                  

                  <div class="col-6">
                     <h4></h4>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" type="submit">update Profile</button>
                </div>
                 </form>
              </div>

<!-- Tunga -->

          
        
      </div>
      </div>
      </div>
      </div>
      </div>
      </main>
    </section>
    <!-- Schedule Section End -->

    <!-- Subscribe Area Start -->
 
    <!-- Subscribe Area End -->

    <div id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="site-info">
              <p>© Designed and Developed by <a href="#" rel="nofollow">MLIS Student</a></p>
            </div>      
          </div>
        </div>
      </div>
    </div>

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
        <i class="lni-chevron-up"></i>
    </a>

    <!-- <div id="preloader">
      <div class="sk-circle">
        <div class="sk-circle1 sk-child"></div>
        <div class="sk-circle2 sk-child"></div>
        <div class="sk-circle3 sk-child"></div>
        <div class="sk-circle4 sk-child"></div>
        <div class="sk-circle5 sk-child"></div>
        <div class="sk-circle6 sk-child"></div>
        <div class="sk-circle7 sk-child"></div>
        <div class="sk-circle8 sk-child"></div>
        <div class="sk-circle9 sk-child"></div>
        <div class="sk-circle10 sk-child"></div>
        <div class="sk-circle11 sk-child"></div>
        <div class="sk-circle12 sk-child"></div>
      </div>
    </div> -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../grandcss/js/jquery-min.js"></script>
    <script src="{{ asset('../grandcss/js/popper.min.js')}}"></script>
    <script src="{{ asset('../grandcss/js/bootstrap.min.js')}}"></script> 
    <script src="{{ asset('../grandcss/js/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('../grandcss/js/wow.js')}}"></script>
    <script src="{{ asset('../grandcss/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('../grandcss/js/nivo-lightbox.js')}}"></script>
    <script src="{{ asset('../grandcss/js/main.js')}}"></script>  
    <!-- Essential javascripts for login to work-->
    <script src="{{ asset('../logins/js/placeholders.min.js')}}"></script> <!-- polyfill for the HTML5 placeholder attribute -->
    <script src="{{ asset('../logins/js/main.js')}}"></script> <!-- Resource JavaScript -->
      
  </body>
</html>
