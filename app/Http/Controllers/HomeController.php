<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class HomeController extends Controller
{
  public function index() {
    return view('home');
  }
  public function help() {
    return view('tutorial');
  }
  public function invoice($book_id) {
    $book = Book::findOrFail($book_id);
    return view('invoice',compact('book'));
  }
}
