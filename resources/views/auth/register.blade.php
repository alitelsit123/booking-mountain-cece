@extends('auth.layout')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 text-center mb-5">
      <h2 class="heading-section">Daftar Akun Gunung Budheg</h2>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
      <div class="login-wrap p-0">
        <form action="register" class="signin-form" method="POST">
          @csrf
          <div class="form-group">
            <input type="text" name="name" class="form-control @error('name')
              error
            @enderror" placeholder="Nama Lengkap" required>
            @error('name')
              <label for="name" style="color:red;font-weight:bolder">{{$message}}</label>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" name="nik" class="form-control @error('nik')
            error
          @enderror" placeholder="NIK" required>
            @error('nik')
              <label for="nik" style="color:red;font-weight:bolder">{{$message}}</label>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control @error('email')
            error
          @enderror" placeholder="Email" required>
            @error('email')
              <label for="email" style="color:red;font-weight:bolder">{{$message}}</label>
            @enderror
          </div>
          <div class="form-group">
            <input type="password" name="password" value="{{session('password')}}" class="form-control @error('password')
            error
          @enderror" placeholder="password" required>
            @error('password')
              <label for="password" style="color:red;font-weight:bolder">{{$message}}</label>
            @enderror
          </div>
          <div class="form-group">
            <div>
              Sudah Punya Akun ? 
              <a href="{{url('login')}}" style="text-decoration: underline;font-weight:bolder">
                Masuk
              </a>
            </div>
          </div>
          <div class="form-group" style="display: flex;">
            <button type="button" onclick="document.location.href='/';" class="form-control btn submit px-3" style="margin-right:0.2rem;width: auto;flex-grow:1;border:1px solid white;">Kembali</button>
            <button type="submit" class="form-control btn btn-primary submit px-3" style="margin-left:0.2rem;width: auto;flex-grow:1;">Daftar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection