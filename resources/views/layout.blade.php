<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Budeg Mountain</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{url('/')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('/')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/themify-icons.css">
    <link rel="stylesheet" href="{{url('/')}}/css/nice-select.css">
    <link rel="stylesheet" href="{{url('/')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{url('/')}}/css/gijgo.css">
    <link rel="stylesheet" href="{{url('/')}}/css/animate.css">
    <link rel="stylesheet" href="{{url('/')}}/css/slicknav.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->



    <style>
      .right-submenu{
        background-color:white;
        top: 2.5rem;
        padding:0.75rem;
        position: absolute;
        -webkit-transition: .3s;
        -moz-transition: .3s;
        -o-transition: .3s;
        transition: all ease 0.3s;
        width: 100%;
        opacity: 1;
      }
      .right-submenu > li {
        font-weight: 600;
        padding: 0.2rem;
        font-size: 14px;
        color: #000;
      }
      .slicknav_btn{
        margin-top:2.5rem;
      }


      @media screen and (min-width: 992px) {
        .account-xs{
          display: none!important;
        }
      }

      .fade{
        opacity: 0;
        top: 5rem;
      }
    </style>

    <!-- JS here -->
    <script src="{{url('/')}}/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{url('/')}}/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{url('/')}}/js/popper.min.js"></script>
    <script src="{{url('/')}}/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/js/owl.carousel.min.js"></script>
    <script src="{{url('/')}}/js/isotope.pkgd.min.js"></script>
    <script src="{{url('/')}}/js/ajax-form.js"></script>
    <script src="{{url('/')}}/js/waypoints.min.js"></script>
    <script src="{{url('/')}}/js/jquery.counterup.min.js"></script>
    <script src="{{url('/')}}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{url('/')}}/js/scrollIt.js"></script>
    <script src="{{url('/')}}/js/jquery.scrollUp.min.js"></script>
    <script src="{{url('/')}}/js/wow.min.js"></script>
    <script src="{{url('/')}}/js/nice-select.min.js"></script>
    <script src="{{url('/')}}/js/jquery.slicknav.min.js"></script>
    <script src="{{url('/')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{url('/')}}/js/plugins.js"></script>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area pt-0" style="background-color: rgba(0, 0, 0, 0.418);">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-5 col-lg-5">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation" style="text-align: left;padding-left: 2rem">
                                        <li><a class="@if (request()->segment(1) === null)
                                          active
                                        @endif" href="{{url('/')}}">Home</a></li>
                                        <li><a class="@if (request()->segment(1) === 'gallery')
                                          active
                                        @endif" href="{{url('/gallery')}}">Gallery</a></li>
                                        <li><a class="@if (request()->segment(1) === 'tutorial')
                                          active
                                        @endif" href="{{url('/')}}">How To</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-1">
                            <div class="logo-img">
                                <a href="{{url('/')}}">
                                    {{-- <img src="logo.png" alt="" width="200px"> --}}
                                    {{-- <div>lajdf</div> --}}
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 d-none d-lg-block">
                            <div class="book_room">
                                <div class="book_btn d-none d-lg-block" style="position: relative;">
                                    <a class="popup-with-form" href="#test-form">Booking Sekarang!</a>
                                    
                                    @guest
                                    <a class="popup-with-form" onclick="document.location.href='{{url('login')}}';" style="cursor:pointer;background-color:transparent;font-weight:bold">
                                      Masuk
                                    </a>
                                    @endguest

                                    @auth
                                    <a class="open-submenu" style="cursor:pointer;background-color:transparent;font-weight:bold">
                                      Hallo, {{\ucfirst(\explode(' ', auth()->user()->name)[0])}} 
                                      <span class="fa fa-caret-down" style="margin-left: 0.2rem"></span>
                                    </a>
                                    <ul class="right-submenu fade">
                                      @auth
                                        @if (auth()->user()->role === 'admin')
                                        <li style="margin-bottom: 0.75rem;cursor: pointer;" onclick="document.location.href='{{url('a')}}'">Dashboard Admin</li>                                          
                                        @endif
                                      @endauth
                                      <li style="margin-bottom: 0.75rem;cursor: pointer;" onclick="document.location.href='{{url('profile')}}'">Profile</li>
                                      <li onclick="document.location.href='{{url('logout')}}'" style="cursor: pointer;">Logout</li>
                                    </ul>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    @yield('content')

    <!-- footer -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                address
                            </h3>
                            <p class="footer_text"> 200, Green road, Mongla, <br>
                                New Yor City USA</p>
                            <a href="#" class="line-button">Get Direction</a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Reservation
                            </h3>
                            <p class="footer_text">+10 367 267 2678 <br>
                                reservation@montana.com</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Navigation
                            </h3>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Rooms</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">News</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Newsletter
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Sign Up</button>
                            </form>
                            <p class="newsletter_text">Subscribe newsletter to get updates</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-8 col-md-7 col-lg-9">
                        <p class="copy_right">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="col-xl-4 col-md-5 col-lg-3">
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- link that opens popup -->

    <!-- form itself end-->
    <form id="test-form" method="POST" action="{{url('book')}}" class="white-popup-block mfp-hide">
      @csrf
      <div class="popup_box py-4">
          <div class="popup_inner">
              <h3 class="text-left d-flex align-items-center justify-content-between mb-4">
                <div>Cek Tanggal Booking</div>
                <span class="fa fa-times" style="cursor: pointer;" onclick="$.magnificPopup.close()"></span>
              </h3>
              <div class="alert alert-success">
                <strong>Ingin Cepat isi form ?</strong> <a href="{{url('/login')}}">Login sekarang</a>
              </div>
              @php
                $_ci = session('date');
                if($_ci) {
                  $_ = explode('-', session('date'));
                  $_ci = $_[2].'/'.$_[1].'/'.$_[0];
                }
              @endphp
              <div class="row">
                <div class="col-xl-12 text-left">
                    {{-- Tanggal --}}
                    <input id="datepicker" onkeydown="return false;" name="date" value="{{$_ci}}" required class="mt-1" placeholder="Tanggal Mendaki">
                </div>
                @error('error_book')
                  <div class="col-md-12 text-left">
                    <div class="alert alert-danger">
                      <strong>Maaf!</strong> {{$message ?? ''}}
                    </div>
                  </div>
                @enderror

                <div class="col-xl-12">
                    <button type="submit" class="boxed-btn3">Cek</button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </form>
    <!-- form itself end -->
    <script src="{{url('/')}}/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="{{url('/')}}/js/contact.js"></script>
    <script src="{{url('/')}}/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{url('/')}}/js/jquery.form.js"></script>
    <script src="{{url('/')}}/js/jquery.validate.min.js"></script>
    <script src="{{url('/')}}/js/mail-script.js"></script>

    <script src="{{url('/')}}/js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
    </script>

    <script>
      $('.open-submenu').click(function() {
        console.log($('.right-submenu').hasClass('fade'))
        if($('.right-submenu').hasClass('fade')) {
          $('.right-submenu').removeClass('fade')
        } else {
          $('.right-submenu').addClass('fade')
        }
      });
    </script>

</body>

</html>