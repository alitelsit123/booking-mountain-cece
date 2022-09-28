@php
  $fillables = [
    // ['name' => 'name', 'placeholder' => 'Masukkan Nama', 'default_value' => 'user'],
    // ['name' => 'phone', 'placeholder' => 'Masukkan Nomor Hp', 'default_value' => '0895355094422'],
    // ['name' => 'email', 'placeholder' => 'Masukkan Email', 'default_value' => 'user@gmail.com'],
    // ['name' => 'nik', 'placeholder' => 'Masukkan NIK', 'default_value' => '123456789'],
    // ['name' => 'age', 'placeholder' => 'Masukkan Usia', 'default_value' => 22],
    // ['name' => 'weight', 'placeholder' => 'Masukkan Berat Badan', 'default_value' => 165],
    // ['name' => 'country', 'placeholder' => 'Masukkan Negara', 'default_value' => 'indonesia'],
    // ['name' => 'province', 'placeholder' => 'Masukkan Provinsi', 'default_value' => 'Yogyakarta'],
    // ['name' => 'city', 'placeholder' => 'Masukkan Kota', 'default_value' => 'Sleman'],
    // ['name' => 'region', 'placeholder' => 'Masukkan Kecamatan', 'default_value' => 'Depok'],
    // ['name' => 'place', 'placeholder' => 'Masukkan Kelurahan', 'default_value' => 'Ringroad Utara'],
  ];
@endphp
@foreach ($members as $i => $row)
<input type="hidden" name="ids[]" value="{{$row['id']}}">
<div class="card c-member mb-4">
  <div class="card-header d-flex justify-content-between align-items-center">
    <div>Anggota {{$i+1}}</div>
    <button type="button" class="btn btn-danger btn-sm btn-destroy-member" data-id='{{$row['id']}}'><span class="fa fa-trash"></span></button>
  </div>
  <div class="card-body">
    <div class="row mb-2">
      @foreach (array_keys($row->except(['id'])->toArray()) as $col)
        <div class="col-md-6 my-2">
          <input 
          type="text" 
          value="" 
          name="{{$col.'_'.$row['id']}}" 
          placeholder="{{ucfirst($col)}}" 
          required
          class="form-control mt-1">
        </div>
      @endforeach        
    </div>
  </div>
</div>
@endforeach
<script>
  $('.btn-destroy-member').click(function() {
    $.get('get_members_tamplate/'+$(this).data('id'), function(_r) {
      $('.body-member').html(_r)              
    })
  })
</script>