<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function login() {
    return view('auth.login');
  }
  public function doLogin(Request $r) {
    $email = $r->email;
    $password = $r->password;

    if (auth()->attempt(['email' => $email,'password' => $password])) {
      session()->regenerate();
      redirect()->intended('/');
    }

    return back()->withErrors(['credentials' => 'Email / Password Salah !']);
  }

  public function register() {
    return view('auth.register');
  }
  public function doRegister(Request $r) {
    $r->validate([
      'name' => ['required'],
      'email' => ['required', 'email', 'unique:users,email'],
      'nik' => ['required', 'numeric', 'unique:users,nik'],
      'password' => ['required']
    ]);

    $user = User::create([
      'name' => $r->name,
      'nik' => $r->nik,
      'email' => $r->email,
      'password' => \bcrypt($r->password),
    ]);

    return redirect('login')->with(['email' => $r->email,'password' => $r->password]);
  }
  
  public function logout() {
    auth()->logout();
    return redirect('login');
  }
}
