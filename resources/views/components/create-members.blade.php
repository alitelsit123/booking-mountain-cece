<input type="hidden" name="ids[]" value="{{$member['id']}}" class="input-{{$member['id']}}">
<div class="card c-member mb-4 card-{{$member['id']}}">
  <div class="card-header d-flex justify-content-between align-items-center">
    <div>Anggota {{sizeof($members)}}</div>
    <button type="button" class="btn btn-danger btn-sm btn-destroy-member" data-id='{{$member['id']}}'><span class="fa fa-trash"></span></button>
  </div>
  <div class="card-body">
    <div class="row mb-2">
      @foreach (array_keys($member->except(['id'])->toArray()) as $col)
        @if (in_array($col, ['province','region','city','place']))
        <select name="{{$col.'_'.$member['id']}}" class="js-example-basic-single-{{$col.'_'.$member['id']}} w-100 form-control" name="state">
        </select>
    
        <script>
        
        $(document).ready(function() {
          @if ($col == 'province')
          const url = 'get_province'
          @elseif ($col == 'city')
          const url = 'get_city'
          @elseif ($col == 'region')
          const url = 'get_region'
          @elseif ($col == 'place')
          const url = 'get_place'
          @endif
          $('.js-example-basic-single-{{$col.'_'.$member['id']}}').select2({
            placeholder: '{{$col}}',
            ajax: {
              url: url,
              processResults: function (data) {
                console.log(data);
                return {
                  results: data
                };
              }
            }
          });
        });
        </script>
        @else
        <div class="col-md-6 my-2">
          <input 
          type="text" 
          value="" 
          name="{{$col.'_'.$member['id']}}" 
          placeholder="{{ucfirst($col)}}" 
          required
          class="form-control mt-1">
        </div>
        @endif
      @endforeach        
    </div>
  </div>
</div>
<script>
  $('.btn-destroy-member').click(function() {
    $.get('get_members_tamplate/'+$(this).data('id'), function(_r) {
      $('.input-{{$member['id']}}').remove();          
      $('.card-{{$member['id']}}').remove();          
    })
  })
</script>