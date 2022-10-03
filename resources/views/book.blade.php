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

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg_2">
  <h3>Booking</h3>
</div>
<!-- bradcam_area_end -->

<div class="alert alert-success">
  <strong>Mohon Lengkapi form Anggota dibawah ini untuk melanjutkan.</strong>
</div>

<!-- ================ contact section start ================= -->
<section class="contact-section" style="padding-top: 40px">
  <div class="container">
    <form action="{{url('book/payment')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12 px-0">
          <div class="d-flex justify-content-between align-items-center">
            <h3 class="text-left mb-2 font-weight-bold">Ketua Kelompok</h3>
            @auth
            <a href="{{url('/book?me=leader')}}" class="btn btn-success btn-sm">Isi Dengan Data Saya</a>              
            @endauth
          </div>
        </div>
        @include('components.input-member', ['leader' => true])
  
        <div class="col-xl-12 text-left mt-4">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h3 class="col-xl-12 text-left mb-2 mx-0 font-weight-bold"></h3>
          </div>
        </div>
  
        <h3 class="col-xl-12 text-left font-weight-bold mb-4 px-0">Anggota</h3>
        <div class="col-md-12 px-0">
          <div class="body-member">
              @include('components.new-members')
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-center w-100">
          <button type="button" class="btn btn-primary btn-sm btn-create-member">
            <span class="fa fa-plus mr-1"></span> Tambah Anggota
          </button>
          <button type="submit" class="btn btn-success btn-sm">
            Lanjut Booking
          </button>
        </div>
        <script>
          $('.btn-create-member').click(function() {
            $.get('get_input_member_template', function(_r) {
              $('.body-member').append(_r)              
            })
          })
        </script>
      </div>
    </form>
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