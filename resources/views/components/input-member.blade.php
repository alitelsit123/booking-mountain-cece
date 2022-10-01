@php
  $leader_fillables = [
    ['name' => 'leader_name', 'placeholder' => 'Masukkan Nama', 'default_value' => ''],
    ['name' => 'leader_phone', 'placeholder' => 'Masukkan Nomor Hp', 'default_value' => ''],
    ['name' => 'leader_email', 'placeholder' => 'Masukkan Email', 'default_value' => ''],
    ['name' => 'leader_nik', 'placeholder' => 'Masukkan NIK', 'default_value' => ''],
    ['name' => 'leader_age', 'placeholder' => 'Masukkan Usia', 'default_value' => ''],
    ['name' => 'leader_weight', 'placeholder' => 'Masukkan Berat Badan', 'default_value' => ''],
    ['name' => 'leader_country', 'placeholder' => 'Masukkan Negara', 'default_value' => 'indonesia'],
    ['name' => 'leader_province', 'api' => 'get_province', 'placeholder' => 'Masukkan Provinsi', 'default_value' => '', 'select2' => true],
    ['name' => 'leader_city', 'api' => 'get_city', 'placeholder' => 'Masukkan Kota', 'default_value' => '', 'select2' => true],
    ['name' => 'leader_region', 'api' => 'get_region', 'placeholder' => 'Masukkan Kecamatan', 'default_value' => '', 'select2' => true],
    ['name' => 'leader_place', 'api' => 'get_place', 'placeholder' => 'Masukkan Kelurahan', 'default_value' => '', 'select2' => true],
  ];
@endphp
<style>
  .select2-container--default .select2-selection--single{
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    height: 38px;
    transform: translateY(5px)
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height: unset;
    opacity: 0.8;
    font-size: 14px;
  }
  .select2-container--default .select2-selection--single .select2-selection__arrow{
    top:50%;
    transform: translateY(-50%)
  }
  .select2-container{
    width: 100%!important;
  }
</style>
@if (isset($leader))
<div class="row mb-2">
  @foreach ($leader_fillables as $i => $row)
  <div class="col-md-6 my-2">
    @if (isset($row['select2'])) 
    <select name="{{$row['name']}}" class="js-example-basic-single-{{$row['name']}} w-100 form-control" name="state">
    </select>

    <script>
    $(document).ready(function() {
      $('.js-example-basic-single-{{$row['name']}}').select2({
        placeholder: '{{$row['placeholder']}}',
        ajax: {
          url: '{{$row['api']}}',
          data: function(params) {
            return {
              ...params,
              province: $('select[name="leader_province"]').val(),
              city: $('select[name="leader_city"]').val(),
              region: $('select[name="leader_region"]').val(),
              place: $('select[name="leader_place"]').val(),
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
    <input 
    type="text" 
    @if ($row['name'] == 'leader_country')
    readonly
    value="INDONESIA"
    @else
    value="{{request('me') === 'leader' ? auth()->user()->{str_replace('leader_', '', $row['name'])}: ''}}"
    @endif 
    name="{{$row['name']}}" 
    placeholder="{{$row['placeholder']}}" 
    required
    class="form-control mt-1">
    @endif
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