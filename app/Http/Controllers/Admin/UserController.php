<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\WebView;
use App\User;

class UserController extends Controller
{
  public function index() {
    $pageViews = WebView::query()->count();
    $totalUsers = User::query()->where('email', 'not like', '%admin%')->count();
    $users = User::where('email', 'not like', '%admin%');

    if(request('search')) {
      $search = request('search');
      $users->where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%')->orWhere('nik','like','%'.$search.'%')->orWhere('phone','like','%'.$search.'%')->orWhere('age','like','%'.$search.'%')->orWhere('weight','like','%'.$search.'%')->orWhere('country','like','%'.$search.'%')->orWhere('province','like','%'.$search.'%')->orWhere('region','like','%'.$search.'%')->orWhere('city','like','%'.$search.'%')->orWhere('place','like','%'.$search.'%');
    }

    $users = $users->get();
    return view('admin.user', compact('pageViews', 'totalUsers', 'users'));
  }
}
