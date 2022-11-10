@extends('admin.layout')

@section('content')
  
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengguna</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('a')}}">Home</a></li>
          <li class="breadcrumb-item active">Pengguna</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">Website Statistik</div>
    <div class="card-body">
      
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="info-box bg-light">
            <div class="info-box-content">
              <span class="info-box-text text-center text-muted">Website Dilihat</span>
              <span class="info-box-number text-center text-muted mb-0">{{$pageViews}}x</span>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="info-box bg-light">
            <div class="info-box-content">
              <span class="info-box-text text-center text-muted">Total User Mendaftar</span>
              <span class="info-box-number text-center text-muted mb-0">{{$totalUsers}} Pengguna</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div class="flex-grow-1">User</div>
      <form action="{{url()->current()}}" method="get">
        <input type="hidden" name="payment_status" value="{{request('payment_status')}}" />
        <div class="flex-grow-0">
          <div class="d-flex justify-content-center align-items-center">
            <span>Pencarian: </span>
            <input type="text" name="search" value="{{request('search')}}" class="form-control form-control-sm ml-2" id="" placeholder="Search Name, Nik, dll." />
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
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Nik</th>
            <th scope="col">Nomor Hp</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @php
            $_n = 0;
          @endphp
          @forelse ($users as $row)
            <tr>
              <td>{{++$_n}}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->email}}</td>
              <td>{{$row->nik}}</td>
              <td>{{$row->phone}}</td>
            </tr>
          @empty
            <tr>
              <td colspan="5"></td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection