<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="book-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="book-{{$row->id}}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$row->invoice_code}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-4">
          <div class="col-md-6 d-flex justify-content-between align-items-center">
             <strong>Tanggal Mendaki:</strong>
             <div>{{$row->date}}</div>
          </div>
          <div class="col-md-6 d-flex justify-content-between align-items-center">
             <strong>Pembayaran Sukses Pada:</strong>
             <div>
              @if ($row->payment_status === 'settlement')
                {{$row->payment_success_at}}
              @else
                -
              @endif
             </div>
          </div>
          <div class="col-md-6 d-flex justify-content-between align-items-center">
            <strong>Jumlah Orang:</strong>
            <div>{{$row->members()->count()}}</div>
         </div>
         <div class="col-md-6 d-flex justify-content-between align-items-center">
            <strong>Status Pembayaran:</strong>
            <div>
            @if ($row->payment_status === 'settlement')
              <span class="badge badge-success">{{$row->payment_status}}</span>
            @else
              <span class="badge badge-warning">{{$row->payment_status}}</span>
            @endif
            </div>
          </div>
          <div class="col-md-12 mt-4">
            <h6>Ketua Kelompok</h6>
          </div>
          @php
            $_leader = [
              'Nama' => $leader ? $leader->name: '',
              'Nomor Hp' => $leader ? $leader->phone: '',
              'Email' => $leader ? $leader->email: '',
              'NIK' => $leader ? $leader->nik: '',
              'Usia' => $leader ? $leader->age: '',
              'Negara' => $leader ? $leader->country: '',
              'Provinsi' => $leader ? $leader->province: '',
              'Kota' => $leader ? $leader->city: '',
              'Kecamatan' => $leader ? $leader->region: '',
              'Kelurahan' => $leader ? $leader->place: '',
            ];
          @endphp
          @foreach (array_keys($_leader) as $_l)
          <div class="col-md-6 d-flex justify-content-between align-items-center">
            <strong>{{$_l}}:</strong>
            <span>{{$_leader[$_l]}}</span>
          </div>
          @endforeach
        </div>
        <h6>Anggota Kelompok</h6>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">Nomor Hp</th>
                <th scope="col">Email</th>
                <th scope="col">Nik</th>
                <th scope="col">Usia</th>
                <th scope="col">Berat Badan</th>
                <th scope="col">Negara</th>
                <th scope="col">Provinsi</th>
                <th scope="col">Kota</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Kelurahan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($members as $member)
              <tr>
                <td>{{$member->name}}</td>
                <td>{{$member->phone}}</td>
                <td>{{$member->email}}</td>
                <td>{{$member->nik}}</td>
                <td>{{$member->age}}</td>
                <td>{{$member->weight}}</td>
                <td>{{$member->country}}</td>
                <td>{{$member->province}}</td>
                <td>{{$member->city}}</td>
                <td>{{$member->region}}</td>
                <td>{{$member->place}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>