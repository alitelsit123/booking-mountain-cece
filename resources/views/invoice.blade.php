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
    <div class="container" style="margin-bottom: 18px;margin-top: 18px;">
      <div class="row">
        <div class="col-md-6 mx-auto px-0">
          <button id="btn-print" style="width: 100%;background-color:rgb(31, 0, 207);color:white;padding: 0.5rem;border: 1px solid rgba(0, 0, 0, 0.144)">Download Invoice</button>
        </div>
      </div>
    </div>
    <div class="container" id="downloadable">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 m-auto py-4" style="border: 1px solid rgba(0, 0, 0, 0.144)">
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
                  <thead class="thead-dark">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <td>{{$row->age}} Th</td>
                        <td>{{$row->weight}} Kg</td>
                        <td>{{$row->role}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <br/>
                <br/>
                <br/>
                <p>Hormat Kami,</p>
                <p>Panitia Gunung</p>
            </div>
        </div>
    </div>

    <div id="editor"></div>
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    @if (request('from') === 'email')
    <script>
      var doc = new jsPDF();
      var specialElementHandlers = {
          '#editor': function (element, renderer) {
              return true;
          }
      };

      $(document).ready(function() {
        doc.fromHTML($('#downloadable').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('{{$book->invoice_code}}.pdf');
        window.close();
      })
    </script>
    @else
    <script>
      var doc = new jsPDF();
      var specialElementHandlers = {
          '#editor': function (element, renderer) {
              return true;
          }
      };

      $('#btn-print').click(function() {
        doc.fromHTML($('#downloadable').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('{{$book->invoice_code}}.pdf');
      })
    </script>
    @endif
  </body>
</html>