<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Budheg Mountain</title>
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
        visibility: hidden;
        opacity: 0;
        top: 5rem;
      }

      .gj-picker {
        top:50%;
        left:50%!important;
        transform: translateY(-50%);
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
                        <div class="col-md-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation" style="text-align: left;padding-left: 2rem">
                                        <li><a class="@if (request()->segment(1) === null)
                                          active
                                        @endif" href="{{url('/')}}">Home</a></li>
                                        <li><a class="@if (request()->segment(1) === 'gallery')
                                          active
                                        @endif" href="{{url('/gallery')}}">Galeri</a></li>
                                        <li><a class="@if (request()->segment(1) === 'tutorial')
                                          active
                                        @endif" href="{{url('/help')}}">Tutorial Booking</a></li>
                                        <li><a href="#" onclick="$('.search-input').addClass('d-flex');$('.search-input').removeClass('d-none')">Cari Booking</a></li>
                                        {{-- <li><a href="{{url('about')}}">Tentang Kami</a></li> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-6 d-none d-lg-block">
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
                        <div class="col-md-12 px-4 pb-2 d-none search-input">
                          <input class="form-control mr-sm-2 s-input" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-default my-2 my-sm-0 mr-2 submit-search" type="button"><span class="fa fa-search"></span></button>
                          <button class="btn btn-default my-2 my-sm-0" type="button" onclick="$('.search-input').addClass('d-none');$('.search-input').removeClass('d-flex');"><span class="fa fa-times"></span></button>
                        </div>
                        <script>
                          $('.submit-search').click(function(e) {
                            const value = $('.s-input').val().replace(/\s/g, '')
                            if(value && value.length > 0) {
                              const url = '{{url('/book/payment')}}';
                              document.location.href = url+'?book_id=INV.'+value
                            }
                          })
                          $('.s-input').keyup(function(e) {
                            if(e.key === 'Enter') {
                              const value = $('.s-input').val().replace(/\s/g, '')
                              if(value && value.length > 0) {
                                const url = '{{url('/book/payment')}}';
                                document.location.href = url+'?book_id=INV.'+value
                              }
                            }
                          })
                        </script>
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
                                Alamat
                            </h3>
                            <p class="footer_text">Desa Tanggung, Kecamatan Campurdarat, Kabupaten Tulungagung <br>
                                Jawa Timur, Indonesia</p>
                            <a href="#" class="line-button">Dapatkan Map</a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Hubungi Customer Service
                            </h3>
                            <p class="footer_text"><br>
                                budheg.cs@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Navigasi
                            </h3>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Galeri</a></li>
                                <li><a href="#">Tutorial</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Berita
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Langganan</button>
                            </form>
                            <p class="newsletter_text">Langganan Email untuk mendapatkan berita terbaru.</p>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
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
      <div class="popup_box py-4 position-relative">
          <div class="popup_inner">
              <h3 class="text-left d-flex align-items-center justify-content-between mb-4">
                <div>Cek Tanggal Booking</div>
                <span class="fa fa-times" style="cursor: pointer;" onclick="$.magnificPopup.close()"></span>
              </h3>
              @if (session()->has('book_error'))
              <div class="alert alert-danger text-left">
                <strong>Maaf!</strong> {{session('book_error')}}
              </div>
              @else
              <div class="alert alert-success text-left">
                <strong>Ingin Cepat isi form ?</strong> <a href="{{url('/login')}}">Login sekarang</a>
              </div>
              @endif
              @php
                // $_ci = session('date');
                // if($_ci) {
                //   $_ = explode('-', session('date'));
                //   $_ci = $_[2].'/'.$_[1].'/'.$_[0];
                // }
              @endphp
              <div class="row">
                <div class="col-xl-12 text-left">
                    {{-- Tanggal --}}
                    <input id="datepicker" onkeydown="return false;" name="date" required class="mt-1" placeholder="Tanggal Mendaki">
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
        if($('.right-submenu').hasClass('fade')) {
          $('.right-submenu').removeClass('fade')
        } else {
          $('.right-submenu').addClass('fade')
        }
      });
      window.onscroll = function() {
        $('.gj-picker').css('top', window.pageYOffset+'px!important');
      }
      @if (session()->has('book_error'))
      $(document).ready(function() {
        $('.popup-with-form').click()
      })
      @endif
    </script>

</body>

</html>