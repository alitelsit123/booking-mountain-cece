@extends('auth.layout')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 text-center">
      <h6 style="color: white;margin-bottom: 1.2rem">
      <h2 class="heading-section mb-5">Masuk Gunung Budheg</h2>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
      <div class="login-wrap p-0">
        <form action="login" method="post" class="signin-form">
          @csrf
          <div class="form-group">
            <input type="text" name="email" value="{{session('email')}}" class="form-control @error('email')
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
          <div class="form-group" style="text-align:center">
            @error('credentials')
            <label style="color:red;font-weight:bolder">{{$message}}</label>
            @enderror
          </div>
          <div class="form-group">
            <div>Belum Punya Akun ? <a href="{{url('register')}}" style="text-decoration: underline;font-weight:bolder">Daftar</a></div>
          </div>
          <div class="form-group" style="display: flex;">
            <button type="button" class="form-control btn submit px-3" onclick="document.location.href='/';" style="margin-right:0.2rem;width: auto;flex-grow:1;border:1px solid white;">Kembali</button>
            <button type="submit" class="form-control btn btn-primary submit px-3" style="margin-left:0.2rem;width: auto;flex-grow:1;">Masuk</button>
          </div>
          <div class="form-group d-md-flex">
            <div class="w-50">
              <label class="checkbox-wrap checkbox-primary">Ingat Saya
                <input type="checkbox" checked>
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="w-50 text-md-right">
              <a href="#" style="color: #fff">Lupa Password</a>
            </div>
          </div>
        </form>
        <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
        <div class="social d-flex text-center">
          <a href="{{url('auth/google')}}" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-google mr-2"></span> Google</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection