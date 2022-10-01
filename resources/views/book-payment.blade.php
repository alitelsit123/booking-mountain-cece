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
  <h3>Pembayaran</h3>
</div>
<!-- bradcam_area_end -->

<div class="alert alert-success alert-pay" style="display: none;">
  <strong>Refresh Halaman jika sudah membayar.</strong>
</div>

<!-- ================ contact section start ================= -->
<section class="contact-section" style="padding-top: 40px">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-7">
        {{-- <table class="table">
          <tr>
            <th scope="row">Nama</th>
            <td>{{$leader->name}}</td>
          </tr>
          <tr>
            <th scope="row">Nomor Hp</th>
            <td>{{$leader->phone}}</td>
          </tr>
          <tr>
            <th scope="row">Email</th>
            <td>{{$leader->email}}</td>
          </tr>
          <tr>
            <th scope="row">Usia</th>
            <td>{{$leader->age}}</td>
          </tr>
          <tr>
            <th scope="row">Berat Badan</th>
            <td>{{$leader->weight}}</td>
          </tr>
        </table> --}}
        <h3 class="mb-4">Anggota Pendakian</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nama</th>
              <th scope="col">Nomor Hp</th>
              <th scope="col">Usia</th>
              <th scope="col">Berat Badan</th>
              <th scope="col">Role</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">{{$leader->name}}</th>
              <td>{{$leader->phone}}</td>
              <td>{{$leader->age}}</td>
              <td>{{$leader->weight}}</td>
              <td>{{$leader->role}}</td>
            </tr>
            @forelse ($members as $row)
              <tr>
                <th scope="row">{{$row->name}}</th>
                <td>{{$row->phone}}</td>
                <td>{{$row->age}}</td>
                <td>{{$row->weight}}</td>
                <td>{{$row->role}}</td>
              </tr>
            @empty
              <tr>
                <td colspan="4">Tidak ada Anggota</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">Informasi</div>
          <div class="card-body">
            @if ($book->payment_status != 'settlement')
            <div class="alert alert-warning">
              <strong>Perhatian.</strong> Mohon simpan Kode Booking untuk melihat status Booking
            </div>
            @endif
            <ul class="list-group">
              <li class="list-group-item"><strong>Kode Booking {{str_replace('INV.', '', $book->invoice_code)}}</strong></li>
              <li class="list-group-item">Tanggal Pendakian: {{$book->date}}</li>
              <li class="list-group-item">Jumlah Orang: {{$members->count()+1}}</li>
              <li class="list-group-item">Total harga: Rp. {{number_format($book->total_price)}}</li>
            </ul>
          </div>
          <div class="card-footer">
            @if ($book->payment_status === 'settlement')
            <a class="btn btn-success mx-auto btn-block" href="{{url('/invoice'.'/'.$book->id)}}">Lihat Invoice</a>
            @else
            <button class="btn btn-primary mx-auto btn-block" id="pay-button">Bayar Sekarang</button>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ contact section end ================= -->

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

@if ($book->snap_token && $book->payment_status != 'settlement')
<script>
  const payButton = document.querySelector('#pay-button');
  payButton.addEventListener('click', function(e) {
      e.preventDefault();
      snap.pay('{{ $book->snap_token }}', {
          onSuccess: function(result) {
            window.location.reload();
          },
          onPending: function(result) {
            $('.alert-pay').show()
          },
          onError: function(result) {
            $('.alert-pay').show()
          }
      });
  });
</script>
@endif

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