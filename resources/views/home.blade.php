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
                          <h3>Gunung Budheg</h3>
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

@endsection