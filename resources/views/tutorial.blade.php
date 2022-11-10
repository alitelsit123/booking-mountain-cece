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
    background-image:url({{asset('img/banner/book.png')}});
  }
</style>


<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg_book">
  <h3>Bantuan</h3>
</div>
<!-- bradcam_area_end -->

<!-- ================ contact section start ================= -->
<section class="contact-section" style="padding-top: 40px">
  <div class="container">
    <h1 style="font-size: 50px;font-family: 'Verdana';font-weight:900;">Cara Booking</h1>
    <p>1. Klik Tombol BOOKING SEKARANG di pojok kanan atas</p>
    <img src="{{asset('img/step1.png')}}" />
    <p>2. Pilih Tanggal Mendaki lalu Klik Cek untuk mengecek apakah kuota mendaki tersedia.</p>
    <img src="{{asset('img/step2.png')}}" />
    <p>3. Isi Form Ketua rombongan</p>
    <img src="{{asset('img/step3.png')}}" width="100%" />
    <p>4. Untuk menambah anggota klik tombol tambah anggota</p>
    <img src="{{asset('img/step4.png')}}" />
    <p>5. Nanti akan muncul form untuk anggota, silahkan isi formnya.</p>
    <img src="{{asset('img/step4a.png')}}" width="100%" />
    <p>6. Untuk menghapus anggota klik tombol merah</p>
    <img src="{{asset('img/step4b.png')}}" />
    <p>7. Jika sudah klik tombol lanjut booking</p>
    <img src="{{asset('img/step5.png')}}" />
    <p>8. Nanti akan muncul rincian booking kamu.</p>
    <img src="{{asset('img/step6.png')}}" width="100%" />
    <h4>Pembayaran</h4>
    <p>9. Di kotak ini ada rincian pembayaran yg harus kamu bayar, lalu klik bayar sekarang.</p>
    <img src="{{asset('img/paymentstep1.png')}}" />
    <p>10. Setelah di klik akan muncul pop up pembayaran midtrans.</p>
    <img src="{{asset('img/paymentstep2.png')}}" />
    <p>11. Pilih metode pembayaran yang kamu inginkan. contoh indomaret akan muncul code bayar nya.</p>
    <img src="{{asset('img/paymentstep3.png')}}" />
    <p>12. Setelah membayar tunggu sebentar untuk di proses.</p>
    <p>13. Lalu kamu akan diarahkan ke halaman berhasil bayar. silahkan cek emailmu.</p>
    <img src="{{asset('img/paymentstep6.png')}}" width="100%" />
    <p>14. Cek emailmu invoice akan dikirimkan ke email ketua.</p>
    <img src="{{asset('img/paymentstep7.png')}}" />
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