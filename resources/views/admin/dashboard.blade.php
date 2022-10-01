@extends('admin.layout')

@section('content-head')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('a')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('content')
<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$newComers}}</h3>

          <p>Pengunjung Baru</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{url('a/visitor')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$visitorToday}}</h3>

          <p>Pengunjung Hari Ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{url('a/visitor')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$books}}</h3>

          <p>Total Booking</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{url('a/visitor')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><sup style="font-size: 20px">Rp.</sup> {{number_format($income)}}</h3>

          <p>Pembayaran Bulan Ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{url('a/finance')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Informasi
        </div>
        <div class="card-body">
          <div class="row mb-2">
            <div class="col-md-6">
              <div>Nama Gunung</div>
            </div>
            <div class="col-md-6">
              <div>Budheg</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @if (request('mode') === 'edit_booking')
    <div class="col-md-6">
      <form action="{{url('/a/info/update')}}" method="post">
        @csrf
        <input type="hidden" name="info_id" value="{{$info->id}}" />
        <div class="card">
          <div class="card-header">
            Pengaturan Booking 
            <div class="card-tools">
              <a href="{{url('/a')}}" class="btn btn-sm btn-danger">
                Batal
              </a>
              <button type="submit" class="btn btn-sm btn-success">
                simpan
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-2">
              <div class="col-md-6">
                <div>Harga Per Orang</div>
              </div>
              <div class="col-md-6">
                <input type="number" name="price" value="{{$info->price}}" class="form-control" id="" />
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-6">
                <div>Limit Book Dihari yang sama</div>
              </div>
              <div class="col-md-6">
                <input type="number" name="book_limit" value="{{$info->book_limit}}" class="form-control" id="" />
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    @else
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Pengaturan Booking 
          <div class="card-tools">
            <a href="{{url('/a?mode=edit_booking')}}" class="btn btn-sm btn-default">
              Edit
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row mb-2">
            <div class="col-md-6">
              <div>Harga Per Orang</div>
            </div>
            <div class="col-md-6">
              <div>Rp. {{number_format($info->price)}}</div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-6">
              <div>Booking Penuh Dihari yang sama</div>
            </div>
            <div class="col-md-6">
              <div>{{$info->book_limit}} orang</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

  </div>
  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->

@endsection