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
      $user = User::whereEmail($email)->first();
      if($user->role === 'admin') {
        return redirect()->intended('a');
      }
      
      return redirect()->intended('/');
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

  public function redirectToGoogle() {
    return \Laravel\Socialite\Facades\Socialite::driver('google')->redirect();
  }
  public function handleGoogleCallback() {
    try {     
        $user = \Laravel\Socialite\Facades\Socialite::driver('google')->user();
  
        $finduser = User::where('email', $user->email)->first();
  
        if($finduser){
            auth()->login($finduser);
            if($finduser->role === 'admin') {
              return redirect()->intended('a');
            }
            return redirect()->intended('/');
        } else {
            $nik = mt_rand(100000000000000, 999999999999999);
            $_u = User::whereNik($nik)->first();
            while ($_u) {
              $nik = mt_rand(100000000000000, 999999999999999);
              $_u = User::whereNik($nik)->first();
            }
            $newUser = User::create([
                'name' => $user->name,
                'nik' => $nik,
                'email' => $user->email,
                'password' => \bcrypt('12345678')
            ]);

            auth()->login($newUser);

            return redirect()->intended('/');
        }

    } catch (\Exception $e) {
        dd($e->getMessage());
    }
  }
  
  public function logout() {
    auth()->logout();
    return redirect('login');
  }
}
