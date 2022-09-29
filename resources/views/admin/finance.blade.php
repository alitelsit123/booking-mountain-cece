@extends('admin.layout')

@section('content')
  
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Keuangan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Keuangan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">Pemasukan</div>
    <div class="card-body">
      
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="info-box bg-light">
            <div class="info-box-content">
              <span class="info-box-text text-center text-muted">Saldo Masuk</span>
              <span class="info-box-number text-center text-muted mb-0"><sup>Rp. </sup>{{number_format($profit)}}</span>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="info-box bg-light">
            <div class="info-box-content">
              <span class="info-box-text text-center text-muted">Saldo Pending</span>
              <span class="info-box-number text-center text-muted mb-0"><sup>Rp. </sup>{{number_format($pending)}}</span>
            </div>
          </div>
        </div>
      </div>

      <h6>Transactions</h6>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#Invoice</th>
            <th scope="col">Rupiah</th>
            <th scope="col">Tanggal Order</th>
            <th scope="col">Status</th>
            <th scope="col">Deskripsi</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($transactions as $row)
            @php
              $leader = $row->members()->whereRole('leader')->first();
            @endphp
            <tr>
              <td><strong>{{$row->invoice_code}}</strong></td>
              <td>{{number_format($row->total_price)}}</td>
              <td>{{$row->date}}</td>
              <td>{{$row->payment_status}}</td>
              <td>{{ $leader->name }} berhasil membayar sebesar Rp. {{ number_format($row->total_price) }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="5">Belum ada Transaksi</td>
            </tr>
          @endforelse
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection