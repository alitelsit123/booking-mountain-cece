<input type="hidden" name="ids[]" value="{{$member['id']}}" class="input-{{$member['id']}}">
<div class="card c-member mb-4 card-{{$member['id']}}">
  <div class="card-header d-flex justify-content-between align-items-center">
    <div>Anggota {{sizeof($members)}}</div>
    <button type="button" class="btn btn-danger btn-sm btn-destroy-member" data-id='{{$member['id']}}'><span class="fa fa-trash"></span></button>
  </div>
  <div class="card-body">
    <div class="row mb-2">
      @foreach (array_keys($member->except(['id'])->toArray()) as $col)
        <div class="col-md-6 my-2">
          <input 
          type="text" 
          value="" 
          name="{{$col.'_'.$member['id']}}" 
          placeholder="{{ucfirst($col)}}" 
          required
          class="form-control mt-1">
        </div>
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