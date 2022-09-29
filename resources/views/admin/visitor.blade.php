@extends('admin.layout')

@section('content')
  
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengunjung</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('a')}}">Home</a></li>
          <li class="breadcrumb-item active">Pengunjung</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">Pengunjung Hari ini</div>
    <div class="card-body">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Ketua</th>
            <th scope="col">Jumlah Orang</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($bookTodays as $row)
          @php
            $leader = $row->members()->whereRole('leader')->first();
          @endphp
          <tr>
            <th scope="row">{{$leader->nik}}</th>
            <td>{{$leader->name}}</td>
            <td>{{$row->members()->count()}}</td>
          </tr>
          @empty
          <tr>
            <th colspan="3" class="text-center">Tidak ada pengunjung hari ini.</th>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <div class="flex-grow-1">Booking</div>
    </div>
    <div class="card-header d-flex justify-content-between align-items-center">
      <div class="flex-grow-1">
        <span class="mr-1">Payment Status</span>
        <a href="{{url()->current().'?'.http_build_query(
          array_merge(request()->all(), [
            'payment_status' => ''
          ])
        )}}" class="btn btn-xs {{ !request('payment_status') ? 'btn-success': 'btn-default' }}">Semua</a>
        <a href="{{url()->current().'?'.http_build_query(
          array_merge(request()->all(), [
            'payment_status' => 'pending'
          ])
        )}}" class="btn btn-xs {{ request('payment_status') === 'pending' ? 'btn-success': 'btn-default' }}">Pending</a>
        <a href="{{url()->current().'?'.http_build_query(
          array_merge(request()->all(), [
            'payment_status' => 'settlement'
          ])
        )}}" class="btn btn-xs {{ request('payment_status') === 'settlement' ? 'btn-success': 'btn-default' }}">Success</a>
      </div>
      <form action="{{url()->current()}}" method="get">
        <input type="hidden" name="payment_status" value="{{request('payment_status')}}" />
        <div class="flex-grow-0">
          <div class="d-flex justify-content-center align-items-center">
            <span>Pencarian: </span>
            <input type="text" name="search" value="{{request('search')}}" class="form-control form-control-sm ml-2" id="" placeholder="Search Name, Nik, dll." />
            <span class="ml-2">Tanggal: </span>
            <input type="date" name="date" value="{{request('date')}}" class="form-control form-control-sm ml-2" id="" placeholder="Date" />
            <button class="btn btn-success btn-sm ml-2"><span class="fa fa-search"></span></button>
          </div>
        </div>
      </form>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Ketua</th>
            <th scope="col">Tanggal Mendaki</th>
            <th scope="col">Total Orang</th>
            <th scope="col">Status Pembayaran</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($books as $row)
          @php
            $leader = $row->members()->whereRole('leader')->first();
            $members = $row->members()->whereRole('member')->get();
          @endphp
          <tr>
            <th scope="row"><strong>{{$row->invoice_code}}</strong></th>
            <td>{{$leader->name}}</td>
            <td>{{$row->date}}</td>
            <td>{{$row->members()->count()}}</td>
            <td>

              @if ($row->payment_status === 'pending' || !$row->payment_status)
                <div class="badge badge-warning">{{$row->payment_status}}</div>
              @else
                <div class="badge badge-success">{{$row->payment_status}}</div>
              @endif
            </td>
            <td>
              <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#book-{{$row->id}}">Detail</button>
              @include('admin.visitor.book-detail')
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection