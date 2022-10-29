@extends('admin.layout')

@section('content-head')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Gallery</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('a')}}">Home</a></li>
          <li class="breadcrumb-item active">Gallery</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('content')
@if (session()->has('message'))
  @if (session('type') == 'error') 
  <div class="alert alert-danger">
    {{session('message')}}
  </div>
  @else
  <div class="alert alert-success">
    {{session('message')}}
  </div>
  @endif
@endif
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
      Manage Gambar
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#create-image">
          <i class="fas fa-plus"></i> Tambah Gambar
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        @forelse ($images as $row)
          <div class="col-md-4" style="position: relative;">
            <img src="{{url('storage/'.$row->url)}}" width="100%" />
            <a onclick="return confirm('Yakin ingin menghapus ?')" href="{{url('/a/gallery/'.$row->id.'/delete')}}" class="btn btn-secondary" style="position: absolute;top: 0.5rem;right:1rem;">
              <span class="fa fa-trash"></span>
            </a>
          </div>
        @empty
          Belum ada gambar
        @endforelse
      </div>
    </div>
  </div>

  {{-- CREATE GAMBAR MODAL --}}
  <!-- Modal -->
  <form action="{{ url('a/gallery/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="create-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" name="type" value="image" class="form-control d-none" />
            <input type="file" name="image" accept="image/*" required class="form-control" />
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
      Manage Video
      </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#create-video">
          <i class="fas fa-plus"></i> Tambah Video
        </button>
      </div>
    </div>
    <div class="card-body">
      <ul class="list-group">
        @forelse ($videos as $row)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>{{url($row->url)}}</span>
            <div>
              <button class="btn btn-primary" data-toggle="modal" data-target="#edit-video-{{$row->id}}"><span class="fa fa-edit"></span></button>
              <a onclick="return confirm('Yakin ingin menghapus ?')" 
              href="{{url('a/gallery/'.$row->id.'/delete_video')}}"
              class="btn btn-danger"><span class="fa fa-trash"></span></a>
            </div>
            {{-- Edit Video MODAL --}}
            <!-- Modal -->
            <div class="modal fade" id="edit-video-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <form action="{{ url('a/gallery/'.$row->id.'/update_video') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Video Embed</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <input type="text" name="type" value="video" class="form-control d-none" />
                      <input type="text" name="url" value="{{$row->url}}" class="form-control" placeholder="Embed Video" />
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </li>
        @empty
          Belum ada Video
        @endforelse
      </ul>
    </div>
  </div>
  
  {{-- CREATE Video MODAL --}}
  <!-- Modal -->
  <form action="{{ url('a/gallery/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="create-video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Video Url</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" name="type" value="video" class="form-control d-none" />
            <input type="text" name="url" class="form-control" placeholder="Url Youtube / Url Video" />
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>

</div>

@endsection