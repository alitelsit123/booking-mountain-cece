@extends('layout')

@section('content')
  
<!-- slider_area_start -->
<div class="slider_area">
  <div class="slider_active owl-carousel">
      <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="slider_text text-center">
                          <h3>Gunung Budek</h3>
                          <p>Nikmati Perjalananmu.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="single_slider  d-flex align-items-center justify-content-center slider_bg_2">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="slider_text text-center">
                          <h3>Healing Yuk</h3>
                          <p>Bisa Untuk Pelepas Stress.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- slider_area_end -->

<!-- about_area_start -->
<div class="about_area">
  <div class="container">
      <div class="row">
          <div class="col-xl-5 col-lg-5">
              <div class="about_info">
                  <div class="section_title mb-20px">
                      <span>Tentang Kami</span>
                      <h3>Gunung<br>
                          Dengan Suasana Alam Terasa</h3>
                  </div>
                  <p>Suscipit libero pretium nullam potenti. Interdum, blandit phasellus consectetuer dolor ornare
                      dapibus enim ut tincidunt rhoncus tellus sollicitudin pede nam maecenas, dolor sem. Neque
                      sollicitudin enim. Dapibus lorem feugiat facilisi faucibus et. Rhoncus.</p>
                  {{-- <a href="#" class="line-button">Learn More</a> --}}
              </div>
          </div>
          <div class="col-xl-7 col-lg-7">
              <div class="about_thumb d-flex">
                  <div class="img_1">
                      <img src="img/potrait1.jpg" alt="">
                  </div>
                  <div class="img_2">
                      <img src="img/potrait2.jpg" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- about_area_end -->



<!-- video_area_start -->
<div class="video_area video_bg overlay">
  <div class="video_area_inner text-center">
      <span>Pemandangan Gunung Budek</span>
      <h3>Liburan Cerdas <br>
           </h3>
      <a href="https://www.youtube.com/watch?v=rJD4BrO5tOg" class="video_btn popup-video">
          <i class="fa fa-play"></i>
      </a>
  </div>
</div>
<!-- video_area_end -->

<!-- about_area_start -->
<div class="about_area">
  <div class="container">
      <div class="row">
          <div class="col-xl-7 col-lg-7">
              <div class="about_thumb2 d-flex">
                  <div class="img_1">
                    <img src="img/potrait2.jpg" alt="">
                  </div>
                  <div class="img_2">
                    <img src="img/potrait1.jpg" alt="">
                  </div>
              </div>
          </div>
          <div class="col-xl-5 col-lg-5">
              <div class="about_info">
                  <div class="section_title mb-20px">
                      <span>Bukit Kita</span>
                      <h3>Ambil Gambar <br>
                          Cantik</h3>
                  </div>
                  <p>Suscipit libero pretium nullam potenti. Interdum, blandit phasellus consectetuer dolor ornare
                      dapibus enim ut tincidunt rhoncus tellus sollicitudin pede nam maecenas, dolor sem. Neque
                      sollicitudin enim. Dapibus lorem feugiat facilisi faucibus et. Rhoncus.</p>
                  {{-- <a href="#" class="line-button">Learn More</a> --}}
              </div>
          </div>
      </div>
  </div>
</div>
<!-- about_area_end -->

<!-- features_room_startt -->
<div class="features_room">
  <div class="container">
      <div class="row">
          <div class="col-xl-12">
              <div class="section_title text-center mb-100">
                  <span>Featured</span>
                  <h3>Ada apa aja sih ?</h3>
              </div>
          </div>
      </div>
  </div>
  <div class="rooms_here">
      <div class="single_rooms">
          <div class="room_thumb">
              <img src="img/rooms/1.png" alt="">
              <div class="room_heading d-flex justify-content-between align-items-center">
                  <div class="room_heading_inner">
                      {{-- <span>From $250/night</span> --}}
                      <h3>Bukit</h3>
                  </div>
                  {{-- <a href="#" class="line-button">book now</a> --}}
              </div>
          </div>
      </div>
      <div class="single_rooms">
          <div class="room_thumb">
              <img src="img/rooms/2.png" alt="">
              <div class="room_heading d-flex justify-content-between align-items-center">
                  <div class="room_heading_inner">
                      {{-- <span>From $250/night</span> --}}
                      <h3>Kantin</h3>
                  </div>
                  {{-- <a href="#" class="line-button">book now</a> --}}
              </div>
          </div>
      </div>
  </div>
</div>
<!-- features_room_end -->

<!-- forQuery_start -->
<div class="forQuery">
  <div class="container">
      <div class="row">
          <div class="col-xl-10 offset-xl-1 col-md-12">
              <div class="Query_border">
                  <div class="row align-items-center justify-content-center">
                      <div class="col-xl-6 col-md-6">
                          <div class="Query_text">
                              <p>Tertarik Mencoba ?</p>
                          </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                          <div class="phone_num">
                              <a class="popup-with-form mobile_no" href="#test-form">Booking Sekarang</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- forQuery_end-->

<!-- instragram_area_start -->
<div class="instragram_area">
  <h4 style="text-align: right;" class="pr-4"><a href="{{url('gallery')}}" style="text-decoration: underline;">Lebih Banyak ...</a></h4>
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
</div>
<!-- instragram_area_end -->

@endsection