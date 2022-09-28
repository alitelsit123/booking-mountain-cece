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
</style>


<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg_2">
  <h3>Finish</h3>
</div>
<!-- bradcam_area_end -->

<!-- ================ contact section start ================= -->
<section class="contact-section" style="padding-top: 40px">
  <div class="container">
    <div class="alert alert-success">
      <strong>Berhasil.</strong> Yey pembayaranmu dikonfirmasi. Invoice dikirimkan melalui email Ketua
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