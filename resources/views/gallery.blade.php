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
</style>


<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg_2">
  <h3>Gallery</h3>
</div>
<!-- bradcam_area_end -->

<!-- ================ contact section start ================= -->
<section class="contact-section" style="padding-top: 40px">
  <div class="container">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#info">Gambar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#book">Video</a>
      </li>
    </ul>
  </div>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="info" class="container tab-pane active"><br>
      <!-- Gallery -->
      <div class="row">
        @foreach ($images as $row)
        <div class="col-lg-4 col-md-12 mb-4 p-2">
          <div style="
          width: 100%;
          height: 194px;
          background-image: url('{{asset('storage/'.$row->url)}}');
          background-repeat: no-repeat;
          background-size: contain;
          background-position: center;
          cursor:pointer;
          " class="btn-open-image-{{$row->id}}" data-target="#open-image-{{$row->id}}"></div>
        </div>
        <div id="open-image-{{$row->id}}" style="z-index:9999;position: fixed;top:0;left:0;display:none;width: 100vw;height:100vh;background-color: rgba(0, 0, 0, 0.473);">
          <div style="position: relative;width:100%;">
            <div style="position: absolute;top:10vh;left:50%;transform:translateX(-50%);">
              <div style="position: relative;">
                <div style="
                width: 80vw;
                height: 80vh;
                background-image: url('{{asset('storage/'.$row->url)}}');
                background-repeat: no-repeat;
                background-size: contain;
                background-position: center;
                "></div>
                <button class="btn btn-secondary" onclick="$('#open-image-{{$row->id}}').hide()" style="position: absolute;top:0.5rem;right:3.5rem;"><span class="fa fa-times"></span></button>
              </div>
            </div>
          </div>
        </div>
        <script>
          $('.btn-open-image-{{$row->id}}').click(function() {
            $('#open-image-{{$row->id}}').show();
          })
        </script>
        @endforeach
      </div>
      <!-- Gallery -->
    </div>

    <div id="book" class="container tab-pane fade"><br>
      <div class="row">
        @foreach ($videos as $row)
        <div class="col-md-6">
          <iframe width="420" height="315"
          src="{{$row->url}}">
          </iframe> 
        </div>
        @endforeach
      </div>
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