@php
  $leader_fillables = [
    ['name' => 'leader_name', 'placeholder' => 'Masukkan Nama', 'default_value' => 'user'],
    ['name' => 'leader_phone', 'placeholder' => 'Masukkan Nomor Hp', 'default_value' => '0895355094422'],
    ['name' => 'leader_email', 'placeholder' => 'Masukkan Email', 'default_value' => 'user@gmail.com'],
    ['name' => 'leader_nik', 'placeholder' => 'Masukkan NIK', 'default_value' => '123456789'],
    ['name' => 'leader_age', 'placeholder' => 'Masukkan Usia', 'default_value' => 22],
    ['name' => 'leader_weight', 'placeholder' => 'Masukkan Berat Badan', 'default_value' => 165],
    ['name' => 'leader_country', 'placeholder' => 'Masukkan Negara', 'default_value' => 'indonesia'],
    ['name' => 'leader_province', 'placeholder' => 'Masukkan Provinsi', 'default_value' => 'Yogyakarta'],
    ['name' => 'leader_city', 'placeholder' => 'Masukkan Kota', 'default_value' => 'Sleman'],
    ['name' => 'leader_region', 'placeholder' => 'Masukkan Kecamatan', 'default_value' => 'Depok'],
    ['name' => 'leader_place', 'placeholder' => 'Masukkan Kelurahan', 'default_value' => 'Ringroad Utara'],
  ];
  $fillables = [
    ['name' => 'member_name', 'placeholder' => 'Masukkan Nama', 'default_value' => 'user'],
    ['name' => 'member_phone', 'placeholder' => 'Masukkan Nomor Hp', 'default_value' => '0895355094422'],
    ['name' => 'member_email', 'placeholder' => 'Masukkan Email', 'default_value' => 'user@gmail.com'],
    ['name' => 'member_nik', 'placeholder' => 'Masukkan NIK', 'default_value' => '123456789'],
    ['name' => 'member_age', 'placeholder' => 'Masukkan Usia', 'default_value' => 22],
    ['name' => 'member_weight', 'placeholder' => 'Masukkan Berat Badan', 'default_value' => 165],
    ['name' => 'member_country', 'placeholder' => 'Masukkan Negara', 'default_value' => 'indonesia'],
    ['name' => 'member_province', 'placeholder' => 'Masukkan Provinsi', 'default_value' => 'Yogyakarta'],
    ['name' => 'member_city', 'placeholder' => 'Masukkan Kota', 'default_value' => 'Sleman'],
    ['name' => 'member_region', 'placeholder' => 'Masukkan Kecamatan', 'default_value' => 'Depok'],
    ['name' => 'member_place', 'placeholder' => 'Masukkan Kelurahan', 'default_value' => 'Ringroad Utara'],
  ];
@endphp

@if (isset($leader))
<div class="row mb-2">
  @foreach ($leader_fillables as $i => $row)
  <div class="col-md-6 my-2">
    <input 
    type="text" 
    value="{{isset($row['default_value']) ? $row['default_value']: ''}}" 
    name="{{$row['name']}}" 
    placeholder="{{$row['placeholder']}}" 
    required
    class="form-control mt-1">
  </div>
  @endforeach
</div>
@else
<div class="card c-member mb-4">
  <div class="card-header"></div>
  <div class="card-body">
    <div class="row mb-2">
      @foreach ($fillables as $i => $row)
      <div class="col-md-6 my-2">
        <input 
        type="text" 
        value="{{isset($row['default_value']) ? $row['default_value']: ''}}" 
        name="{{$row['name'].'_'.$i}}" 
        placeholder="{{$row['placeholder']}}" 
        required
        class="form-control mt-1">
      </div>
      @endforeach
    </div>
  </div>
</div>
@endif

<script>
  $('.btn-destroy-member').click(function() {
    $(this).parent().parent().parent().remove()
  })
</script>