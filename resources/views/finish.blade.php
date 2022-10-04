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
    background-image:url({{asset('img/banner/finish.png')}})
  }
</style>


<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg_book">
  <h3>Finish</h3>
</div>
<!-- bradcam_area_end -->

<!-- ================ contact section start ================= -->
<section class="contact-section" style="padding-top: 40px">
  <div class="container">
    <div class="alert alert-success">
      <strong>Berhasil.</strong> Yey pembayaranmu dikonfirmasi. Invoice dikirimkan melalui email Ketua atau <a href="{{url('/invoice'.'/'.$book->id)}}" target="_blank"><strong style="text-decoration: underline;">Klik Disini</strong></a> untuk lihat Invoice.
    </div>
  </div>

</section>
<!-- ================ contact section end ================= -->
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