@extends('layout')

@section('content')
<style>
  .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
    border-radius: 0;
  }
  .card{
    border-radius: 0;
  }
  .btn {
    border-radius: 0;
  }
  .gj-datepicker{
    flex-grow: 1;
    margin-right: .5rem;
  }
  .breadcam_bg_book{
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: bottom;
    background-image:url('{{asset('img/banner/book.png')}}');
  }
</style>


<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg_book">
  <h3>Tentang Kami</h3>
</div>
<!-- bradcam_area_end -->

<!-- about_area_start -->
<div class="about_area">
  <div class="container">
      <div class="row">
          <div class="col-xl-12 col-lg-12">
              <div class="about_info">
                  <div class="section_title mb-20px">
                      <span>About Us</span>
                      <h3>Gunung Budheg Tulungagung</h3>
                  </div>
                  <p>Gunung Budheg Tulungagung  merupakan suatu gunung yang berada di Kabupaten Tulungagung tepatnya di Desa Tanggung, Kecamatan Campurdarat. Gunung Budheg ini teramasuk gunung berapi non-aktif yang memiliki ketinggian hanya sekitar 600 mdpl. Gunung ini memiliki banyak keindahan yang tersimpan dan memiliki cerita menarik yang mengkaitkan tentang Gunung Budheg Tulungagung ini.</p>
              </div>
          </div>
          {{-- <div class="col-xl-7 col-lg-7">
              <div class="about_thumb d-flex">
                  <div class="img_1">
                      <img src="img/about/about_1.png" alt="">
                  </div>
                  <div class="img_2">
                      <img src="img/about/about_2.png" alt="">
                  </div>
              </div>
          </div> --}}
      </div>
  </div>
</div>
<!-- about_area_end -->

<!-- about_info_area_start -->
{{-- <div class="about_info_area">
  <div class="about_active owl-carousel">
      <div class="single_slider about_bg_1"></div>
      <div class="single_slider about_bg_1"></div>
      <div class="single_slider about_bg_1"></div>
      <div class="single_slider about_bg_1"></div>
  </div>
</div> --}}
<!-- about_info_area_start -->

<!-- about_main_info_start -->
{{-- <div class="about_main_info">
  <div class="container">
      <div class="row">
          <div class="col-xl-6 col-md-6">
              <div class="single_about_info">
                  <h3>We Serve Fresh and <br>
                      Delicious Food</h3>
                      <p>Suscipit libero pretium nullam potenti. Interdum, blandit <br> phasellus consectetuer dolor ornare dapibus enim ut tincidunt <br> rhoncus tellus sollicitudin pede nam maecenas, dolor sem. <br> Neque sollicitudin enim. Dapibus lorem feugiat facilisi <br> faucibus et. Rhoncus.
                      </p>
              </div>
          </div>
          <div class="col-xl-6 col-md-6">
              <div class="single_about_info">
                  <h3>We Serve Fresh and <br>
                      Delicious Food</h3>
                      <p>Suscipit libero pretium nullam potenti. Interdum, blandit <br> phasellus consectetuer dolor ornare dapibus enim ut tincidunt <br> rhoncus tellus sollicitudin pede nam maecenas, dolor sem. <br> Neque sollicitudin enim. Dapibus lorem feugiat facilisi <br> faucibus et. Rhoncus.
                      </p>
              </div>
          </div>
      </div>
  </div>
</div> --}}
<!-- about_main_info_end -->

<!-- forQuery_start -->
{{-- <div class="forQuery">
  <div class="container">
      <div class="row">
          <div class="col-xl-10 offset-xl-1 col-md-12">
              <div class="Query_border">
                  <div class="row align-items-center justify-content-center">
                      <div class="col-xl-6 col-md-6">
                          <div class="Query_text">
                                  <p>For Reservation 0r Query?</p>
                          </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                          <div class="phone_num">
                                  <a href="#" class="mobile_no">+10 576 377 4789</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> --}}
<!-- forQuery_end-->

<!-- instragram_area_start -->
{{-- <div class="instragram_area">
  <div class="single_instagram">
      <img src="img/instragram/1.png" alt="">
      <div class="ovrelay">
          <a href="#">
              <i class="fa fa-instagram"></i>
          </a>
      </div>
  </div>
  <div class="single_instagram">
      <img src="img/instragram/2.png" alt="">
      <div class="ovrelay">
          <a href="#">
              <i class="fa fa-instagram"></i>
          </a>
      </div>
  </div>
  <div class="single_instagram">
      <img src="img/instragram/3.png" alt="">
      <div class="ovrelay">
          <a href="#">
              <i class="fa fa-instagram"></i>
          </a>
      </div>
  </div>
  <div class="single_instagram">
      <img src="img/instragram/4.png" alt="">
      <div class="ovrelay">
          <a href="#">
              <i class="fa fa-instagram"></i>
          </a>
      </div>
  </div>
  <div class="single_instagram">
      <img src="img/instragram/5.png" alt="">
      <div class="ovrelay">
          <a href="#">
              <i class="fa fa-instagram"></i>
          </a>
      </div>
  </div>
</div> --}}
<!-- instragram_area_end -->
<script>
$(document).ready(function() {
  $('#filter-datepicker').datepicker({
      iconsLibrary: 'fontawesome',
      icons: {
        rightIcon: '<span class="fa fa-caret-down"></span>'
    }
  });
})

</script>
@endsection