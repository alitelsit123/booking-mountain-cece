<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Gallery;

class GalleryController extends Controller
{
  public function index() {
    $images = Gallery::whereType('image')->paginate(12);
    $videos = Gallery::whereType('video')->paginate(12);
    return view('admin.gallery', compact('images','videos'));
  }
  public function store() {
    $type = request('type');

    if($type === 'image') {
      $url = request()->file('image')->store('public/gallery');      
      $url = \str_replace('public/', '', $url);
      Gallery::create(['type' => 'image', 'url' => $url]);
      return back()->with(['message' => 'Gambar berhasil diupload.']);
    }
    if($type == 'video') {
      Gallery::create(['type' => 'video', 'url' => request('url')]);
      return back()->with(['message' => 'Video berhasil disimpan.']);
    }

    return back()->with(['message' => 'Gambar berhasil diupload.']);
  }
  public function destroy($id) {
    $gallery = Gallery::findOrFail($id)->delete();
    return back()->with(['message' => 'Gambar dihapus']);
  }
  public function updateVideo($id) {
    $gallery = Gallery::findOrFail($id);
    $gallery->url = request('url');
    $gallery->save();
    return back()->with(['message' => 'Video Diupdate']);
  }
  public function destroyVideo($id) {
    $gallery = Gallery::findOrFail($id)->delete();
    return back()->with(['message' => 'Video dihapus']);
  }
}
