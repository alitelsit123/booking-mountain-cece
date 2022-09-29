<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function index() {
    return view('profile');
  }
  public function update() {
    $data = request()->except(['_token']);
    foreach(array_keys($data) as $row) {
      auth()->user()->{$row} = $data[$row];
    }
    auth()->user()->save();
    return redirect('profile')->with(['message' => 'Berhasil Update Profile.']);
  }
}
