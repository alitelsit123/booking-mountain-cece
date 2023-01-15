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
        @if (in_array($col, ['province','region','city','place']))
        <select required name="{{$col.'_'.$row['id']}}" class="js-example-basic-single-{{$col.'_'.$row['id']}} w-100 form-control" name="state">
        </select>
    
        <script>
        
        $(document).ready(function() {
          var placeholder = ''
          @if ($col == 'province')
          const url = 'get_province'
          placeholder = 'Masukkan Provinsi';
          @elseif ($col == 'city')
          const url = 'get_city'
          placeholder = 'Masukkan Kota';
          @elseif ($col == 'region')
          const url = 'get_region'
          placeholder = 'Masukkan Kecamatan';
          @elseif ($col == 'place')
          const url = 'get_place'
          placeholder = 'Masukkan Kelurahan';
          @endif
          $('.js-example-basic-single-{{$col.'_'.$row['id']}}').select2({
            placeholder: placeholder,
            ajax: {
              url: url,
              data: function(params) {
                return {
                  ...params,
                  province: $('select[name="{{'province'.'_'.$row['id']}}"]').val(),
                  city: $('select[name="{{'city'.'_'.$row['id']}}"]').val(),
                  region: $('select[name="{{'region'.'_'.$row['id']}}"]').val(),
                  place: $('select[name="{{'place'.'_'.$row['id']}}"]').val(),
                }
              },
              processResults: function (data) {
                return {
                  results: data
                };
              }
            }
          });
        });
        </script>
        @else
        @php
          if($col == 'name') {
            $placeholder = 'Masukkan Nama';
          }
          if($col == 'phone') {
            $placeholder = 'Masukkan Nomor Hp';
          }
          if($col == 'email') {
            $placeholder = 'Masukkan Email';
          }
          if($col == 'nik') {
            $placeholder = 'Masukkan Nik';
          }
          // if($col == 'age') {
          //   $placeholder = 'Masukkan Usia';
          // }
          // if($col == 'weight') {
          //   $placeholder = 'Masukkan Berat Badan';
          // }
        @endphp
        <input 
        type="text" 
        @if ($col == 'country')
        value="INDONESIA" 
        readonly        
        @endif
        name="{{$col.'_'.$row['id']}}" 
        placeholder="{{$placeholder}}" 
        required
        class="form-control mt-1">
        @endif
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