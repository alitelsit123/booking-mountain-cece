<!doctype html>
<html lang="en">
  <head>
    <title>Invoice Tracker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @php
      $leader = $book->members()->whereRole('leader')->first();
      $members = $book->members()->whereRole('member')->get();
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
                <h3>{{$book->invoice_code}}</h3>
                <p> Hallo, {{$leader->name}}</p>
                <p>Pembayaran untuk Booking Gunung Budheg berhasil.</p>
                <p>Rincian: </p>
                <ul class="list-group">
                  <li class="list-group-item">Tanggal Pendakian: {{$book->date}}</li>
                  <li class="list-group-item">Jumlah Orang: {{$book->members()->count()}}</li>
                  <li class="list-group-item">Total harga: Rp. {{number_format($book->total_price)}}</li>
                </ul>
                <br>
                <h3 class="mb-4">Anggota</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nama</th>
                      <th scope="col">Nomor Hp</th>
                      <th scope="col">Usia</th>
                      <th scope="col">Berat Badan</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">{{$leader->name}}</th>
                      <td>{{$leader->phone}}</td>
                      <td>{{$leader->age}} Th</td>
                      <td>{{$leader->weight}} Kg</td>
                      <td>{{$leader->role}}</td>
                    </tr>
                    @foreach ($members as $row)
                      <tr>
                        <th scope="row">{{$row->name}}</th>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->age}} Th</td>
                        <td>{{$row->weight}} Kg</td>
                        <td>{{$row->role}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <p>Silahkan mencetak invoice berikut untuk dibawa saat pendakian sebagai bukti pembayaran.</p>
                <br />
                <a href="#" id="download-invoice">Download Invoice.</a>
                <script>
                  $('#download-invoice').click(function() {
                    const _w = window.open('{{url('/invoice'.'/'.$book->id)}}?from=email');
                    setTimeout(() => {
                      _w.close()
                    }, 1000)
                  })
                </script>
                <br/>
                <br/>
                <br/>
                <p>Hormat Kami,</p>
                <p>Panitia Gunung</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>