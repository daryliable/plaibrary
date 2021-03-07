<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Plaibrary</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('../grandcss/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{URL::asset('../grandcss/fonts/line-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('../grandcss/css/slicknav.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('../grandcss/css/nivo-lightbox.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{URL::asset('../grandcss/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('../grandcss/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('../grandcss/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('../css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('../logins/css/style.css')}}"> <!-- Resource style -->
    <!-- <link rel="stylesheet" type="text/css" href="../logins/css/reset.css"> --> <!-- CSS reset -->
    <!-- <link rel="stylesheet" type="text/css" href="../logins/css/demo.css"> --> <!-- Demo style -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        
        <div class="cd-signin-modal js-signin-modal"> <!-- this is the entire modal form, including the background -->
          <div class="cd-signin-modal__container"> <!-- this is the container wrapper -->
            <ul class="cd-signin-modal__switcher js-signin-modal-switcher js-signin-modal-trigger">
              <li><a href="#" data-signin="login" data-type="login">Sign in</a></li>
              <li><a href="#" data-signin="signup" data-type="signup">New account</a></li>
            </ul>
            <div class="cd-signin-modal__block js-signin-modal-block" data-type="login"> <!-- log in form -->
              <form class="cd-signin-modal__form" action="{{route('login')}}" method="post">
                {{ csrf_field() }} 
                @include('includes.error')
                <p class="cd-signin-modal__fieldset">
                  <label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="signin-email">E-mail</label>
                  <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signin-email" type="email" name="email" placeholder="E-mail"> 
                </p>

                <p class="cd-signin-modal__fieldset">
                  <label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signin-password">Password</label>
                  <input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signin-password" type="password" name="password" placeholder="Password">
                  <a href="#0" class="cd-signin-modal__hide-password js-hide-password">Show</a> 
                </p> 
                <p class="cd-signin-modal__fieldset">
                  <input class="cd-signin-modal__input cd-signin-modal__input--full-width" type="submit" value="Login">
                </p>
              </form>
             </div> <!-- cd-signin-modal__block -->
           

            <div class="cd-signin-modal__block js-signin-modal-block" data-type="signup" > <!-- sign up form -->
              <form class="cd-signin-modal__form " action="{{ route('register') }}" method="post">
                {{ csrf_field() }}  
                <input class="form-control"  id="name" type="text" class="form-control" name="name"  required autocomplete="name" placeholder="Full Name">

                <input id="email" style="margin-top: 15px" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                @foreach($roles as $role )
                  <select  style="margin-top: 15px" class="form-control" name="roles">
                    <option value="{{$role->id}}">{{$role->name}}</option>
                  </select>  
                @endforeach
                  <!--<select class="form-control " style="margin-top: 15px" name="civil">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select> 
               
                  
                  <input class="form-control" style="margin-top: 15px" id="name" type="text" class="form-control" name="coll_univ" value="{{ old('name') }}" required autocomplete="name" placeholder="University/Institution">
                  -->
                  <input class="form-control" style="margin-top: 15px" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                  <input class="form-control" style="margin-top: 15px" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                 <!--  <input class="form-control" style="margin-top: 15px" type="phone" name="contact_num" placeholder="Mobile Number">
                  <input class="form-control" style="margin-top: 15px" type="address" name="address" placeholder="Address">
                  <p class="cd-signin-modal__fieldset">-->
                  <input style="margin-top: 15px" class="cd-signin-modal__input cd-signin-modal__input--full-width" type="submit" value="Create Account">
                  </p>
                
              </form>
            </div> <!--<cd-signin-modal__block -->

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
                  Book
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">
                  Affiliate
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-signin="login">
                  Join Us
                </a>
              </li>

              <!-- <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-signin="signup">
                  Join
                </a>
              </li> -->
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
            <img class="d-block w-100" src="{{URL::asset('grandcss/img/slider/bookslide3.jpg')}}" alt="First slide">
            <div class="carousel-caption d-md-block">
              <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Library</p>
              <h1 class="wow fadeInDown heading" data-wow-delay=".4s">To build up a library is to create a life. It's never just a random collection of books.</h1>
              <!-- <a href="#" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Get Ticket</a> -->
              <a href="#" class="fadeInRight wow btn btn-border btn-lg" data-wow-delay=".6s">Explore More</a>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{URL::asset('grandcss/img/slider/bookslide2.jpg')}}" alt="Second slide">
            <div class="carousel-caption d-md-block">
              <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Library</p>
              <h1 class="wow bounceIn heading" data-wow-delay=".7s">A library is a place where you learn what teachers were afraid to teach you.</h1>
              <a href="#" class="fadeInUp wow btn btn-border btn-lg" data-wow-delay=".8s">Learn More</a>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{URL::asset('grandcss/img/slider/bookslide1.jpg')}}" alt="Third slide">
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
      <div class="container">
        <!-- <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Event Schedules</h1>
              <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, consectetur adipiscing <br> elit, sed do eiusmod tempor</p>
            </div>
          </div>
        </div> -->

        <div class="row">
        <div class="col-md-3"><!-- <h2 class="mb-2 btn btn-primary btn-block">Search Books</h2> -->
          <div class="tile p-0">
            <h4 class="tile-title folder-head">Filter Search</h4>
            
            <div class="tile-body">
              <form class="text-center form-inline">
                <ul class="nav nav-pills flex-column mail-nav">

                <li class="nav-item" style="padding: 5px">
                  <div class="form-group">
                  <small class="text-muted" style="text-align: left;">Book Title</small>
                  <input class="form-control col-12" name="title" placeholder="Enter Book Title">
                  </div>
                </li>

                <li class="nav-item" style="padding: 5px">
                  <div class="form-group">
                  <small class="text-muted" style="text-align: left;">Book Author</small>
                  <input class="form-control col-12" name="author" placeholder="Enter Book Author">
                  </div>
                </li>

                <li class="nav-item" style="padding: 5px">
                  <div class="form-group">
                  <small class="text-muted" style="text-align: left;">ISBN Number</small>
                  <input class="form-control col-12" name="isbn" placeholder="Enter ISBN Number">
                  </div>
                </li>

                <li class="nav-item" style="padding: 5px">
                  <div class="form-group">
                    <small class="text-muted" style="text-align: left;">Subject</small>
                    <select class="form-control col-12" id="exampleSelect1">
                      <option>Fiction</option>
                      <option>Facts</option>
                      <option>Love Story</option>
                      <option>Mathematics</option>
                      <option>Science</option>
                    </select>
                  </div>
                </li>

                  <button type="submit" class="btn btn-primary sub-btn" data-style="zoom-in" data-spinner-size="30" name="submit" id="submit">
                    <span class="ladda-label"><i class="lni-check-box"></i> Search</span>
                  </button>
                <li style="padding-top: 10px">
                  <p class="text-align">Need to visit other school? <br> Schedule an appointment now!</p>
                </li>
                <li>
                  <form action="/action_page.php">
                    <input style="padding: 40px" type="date" id="birthday" name="birthday">
                  </form>
                </li>
                <li style="padding-top: 10px">
                  <p><a href="">SIGN IN HERE!</a> <br>Don't have an account? <a href="">Click here.</a></p>
                </li>
              </ul>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-9">
          <div class="tile">
          
          
           <div class="row">
            @foreach($books as $book )
              <div class="col-md-4">
                <div class="bookcard">
                  <div class="bookimgBox">
                    <img src="{{ URL::asset('images/book_images/' . $book->image_url) }}" width="200" height="300">
                  </div>
                  <div class="bookdetails">
                    <h6>{{$book->book_name}}</h6>
                    <p>
                      Author: {{$book->book_author}}<br>
                      Publisher: {{$book->book_publisher}}<br>
                      Description: {{$book->book_description}}<br>
                      Genre: {{ $book->genre->genre_name }}
                    </p>      
                  </div>
                  @if(!is_null($book) && $book->book_quantity != 0)
                  <a href="#" class="btn btn-common col-md-12" style="color:#6D6666" data-toggle="modal" data-signin="login">Reserve</a>
                  @else
                  <button class="btn btn-common col-md-12" style="color:#6D6666" type="submit" disabled="">Not Available</button>
                  @endif
                </div>
              </div>
            @endforeach
                  <div class="col-12 text-center pt-5 d-flex justify-content-md-center">
                   {{ $books->links()}}
                  </div>

          </div>
        </div>

      </div>
    </section>
    <!-- Schedule Section End -->

    <!-- Subscribe Area Start -->
    <div id="faq" class="section-padding">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-10 col-lg-7">
            <div class="subscribe-inner wow fadeInDown" data-wow-delay="0.3s">
              <h2 class="subscribe-title">Affiliate your University</h2>
              <div class="col-12 text-center">
            <a href="#" class="btn btn-common">Click for Details</a>
          </div>
              <!-- <a href="speakers.html" class="btn btn-common mt-30 wow fadeInUp" data-wow-delay="1.9s">Click How</a> -->
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- Subscribe Area End -->

    <div id="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="site-info">
             <p> Plaibrary {{ date('Y') }} </p>
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
    
    <script src="{{URL::asset('../grandcss/js/jquery-min.js')}}"></script>
    <script src="{{URL::asset('../grandcss/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('../grandcss/js/bootstrap.min.js')}}"></script> 
    <script src="{{URL::asset('../grandcss/js/jquery.easing.min.js')}}"></script>
    <script src="{{URL::asset('../grandcss/js/wow.js')}}"></script>
    <script src="{{URL::asset('../grandcss/js/jquery.slicknav.js')}}"></script>
    <script src="{{URL::asset('../grandcss/js/nivo-lightbox.js')}}"></script>
    <script src="{{URL::asset('../grandcss/js/main.js')}}"></script>  
    <!-- Essential javascripts for login to work-->
    <script src="{{ asset('../logins/js/placeholders.min.js')}}"></script> <!-- polyfill for the HTML5 placeholder attribute -->
    <script src="{{ asset('../logins/js/main.js')}}"></script> <!-- Resource JavaScript -->
 
  </body>
</html>
