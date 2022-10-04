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
    background-image:url({{asset('img/banner/profile.png')}})
  }
</style>


<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg_book">
  <h3>{{ \explode(' ',auth()->user()->name)[0].'\'s Profile' }}</h3>
</div>
<!-- bradcam_area_end -->
@if (session('message'))
<div class="alert alert-success">
  {{session('message')}}
</div>
@else

@php
  $mustComplete = [
    ['name' => 'name'],
    ['name' => 'phone'],
    ['name' => 'nik'],
    ['name' => 'age'],
    ['name' => 'weight'],
    ['name' => 'country'],
    ['name' => 'province'],
    ['name' => 'city'],
    ['name' => 'region'],
    ['name' => 'place'],
  ];
  $showWarning = false;
  foreach ($mustComplete as $row) {
    if(!auth()->user()->{$row['name']}) {
      $showWarning = true;
    }
  }
@endphp
@if ($showWarning && (!auth()->user()->name || !auth()->user()->phone || !auth()->user()->nik || !auth()->user()->age || !auth()->user()->weight || !auth()->user()->country || !auth()->user()->province || !auth()->user()->city || !auth()->user()->region || !auth()->user()->place))
<div class="alert alert-warning">
  <strong>Wah Profile mu belum lengkap!</strong> Lengkapi profile mu dulu yuk agar mudah isi form Booking.
</div>
@endif

@endif

<!-- ================ contact section start ================= -->
<section class="contact-section" style="padding-top: 40px">
  <div class="container">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#info">Info</a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#book">My Book</a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#friend">My Friends</a>
      </li> --}}
    </ul>
  </div>


  <!-- Tab panes -->
  <div class="tab-content">
    <div id="info" class="container tab-pane active"><br>
      <form action="{{ url('/profile/update') }}" method="post">
        @csrf
        <div class="card mb-5">
          <div class="card-header d-flex justify-content-between align-items-center">
            <div>
              @if (request('mode') === 'edit')
              Edit Profile
              @else
              Info Profile
              @endif
            </div>
            @if (request('mode') === 'edit')
            <div>
              <a href="{{'/profile'}}" class="btn btn-default btn-sm">Batal</a>
              <button type="submit" class="btn btn-primary btn-sm ml-1"><span class="fa fa-pencil"></span> Simpan</button>
            </div>
            @else
            <a href="{{'/profile?mode=edit'}}" class="btn btn-primary btn-sm"><span class="fa fa-pencil"></span> Edit</a>
            @endif
          </div>
          <div class="card-body">
            @php
              $totalTransactions = \App\Book::whereHas('members', function($query) {
                $query->whereEmail(auth()->user()->email);
              })->count();
              $infos = [
                ['Nama', auth()->user()->name],
                ['Email', auth()->user()->email],
                ['NIK', auth()->user()->nik],
                ['Alamat', auth()->user()->place.' '.auth()->user()->region.', '.auth()->user()->city.', '.auth()->user()->province.', '.auth()->user()->country],
                ['Total Transaction', $totalTransactions],
              ]
            @endphp
            @if (request('mode') === 'edit')
            <div class="row">
              <div class="{{ request('mode') === 'edit' ? 'col-md-12':'col-md-8' }}">
                <div class="row">
                  @php
                    $params = [
                      ['name' => 'name'],
                      ['name' => 'phone'],
                      ['name' => 'nik'],
                      ['name' => 'age'],
                      ['name' => 'weight'],
                      ['name' => 'country'],
                      ['name' => 'province'],
                      ['name' => 'city'],
                      ['name' => 'region'],
                      ['name' => 'place'],
                    ];
                  @endphp
                  @foreach ($params as $row)
                  @php
                    $value = \App\User::find(auth()->user()->id)->{$row['name']};
                  @endphp
                  <div class="col-md-6 my-2">
                    <input 
                    type="text" 
                    value="{{ $value }}" 
                    name="{{$row['name']}}" 
                    placeholder="{{ ucfirst($row['name']) }}" 
                    required
                    class="form-control mt-1">
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            @else
            <div class="row">
              <div class="col-md-8">
                <table>
                  @foreach ($infos as $info)
                    <tr>
                      <td style="min-width: 200px;padding-bottom:0.75rem;">{{ $info[0] }}</td>
                      <td style="padding-bottom:0.75rem;">{!! $info[1] !!}</td>
                    </tr>
                  @endforeach
                </table>
              </div>
              <div class="col-md-4">
                {{-- <img src="data:image/png;base64,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" /> --}}
              </div>
            </div>
            @endif
          </div>
        </div>
      </form>

      <h6>Riwayat Pendakian</h6>
      <form action="{{url('/profile')}}" method="get">
        <div class="d-flex">
          {{-- <input class="form-control mr-2" style="height: 50px;width:50%;" placeholder="Search"> --}}
          <input id="filter-datepicker" name="filter_date" value="{{request('filter_date')}}" style="height: 50px;" placeholder="Filter Date">
          <button type="submit" class="btn btn-success" style="height: 50px;width:50px;"><span class="fa fa-search"></span></button>
          @if (request('filter_date'))
          <a href="{{url('profile')}}" class="btn btn-danger ml-1" style="height: 50px;width:50px;"><span class="fa fa-times"></span></a>
          @endif
        </div>
      </form>
      <div>
        @php
          $histories = \App\Book::whereHas('members', function($query) {
            $query->whereEmail(auth()->user()->email);
          })->when(request('filter_date'), function($query) {
            $date = explode('/',request('filter_date'));
            $query->whereDate('date', $date[2].'-'.$date[0].'-'.$date[1]);
          })->get();
        @endphp
        <ul class="list-group">
          @forelse ($histories as $history)
          @php
            $leader = $history->members()->whereRole('leader')->first();
          @endphp
          <li class="list-group-item">
            <div>
              <strong class="pb-2 w-100" style="display:block; border-bottom: 1px solid #ced4da">Mendaki Pada {{$history->date}}</strong>
              <div class="row mt-3">
                <div class="col-md-6">
                  <div>
                    <strong>
                      <div class="mb-2">Ketua: {{$leader->name}}</div>
                    </strong>
                    <div class="mb-2">Total Orang: {{$history->members()->count()}}</div>
                  </div>
                </div>
                <div class="col-md-6">
                  <strong>
                    <div class="mb-2">Tanggal Booking: {{now()}}</div>
                  </strong>
                  <div class="mb-2">Status Pembayaran: <span class="badge {{ $history->payment_status === 'settlement' ? 'badge-success':'badge-warning' }}">{{$history->payment_status}}</span></div>                  
                </div>
              </div>
            </div>
          </li>
          @empty
          <li class="list-group-item">Belum ada riwayat Pendakian.</li>
          @endforelse
        </ul> 
      </div>

    </div>

    <div id="book" class="container tab-pane fade"><br>
      <h3>book</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="friend" class="container tab-pane fade"><br>
      {{-- <h3>history</h3> --}}
      <p>Opps Fitur belum tersedia.</p>
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