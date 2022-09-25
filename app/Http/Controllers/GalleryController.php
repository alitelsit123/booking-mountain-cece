<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gallery;

class GalleryController extends Controller
{
  public function index() {
    $images = Gallery::whereType('image')->get();
    $videos = Gallery::whereType('video')->get();
    return view('gallery',compact('images','videos'));
  }
}
