<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Book;

class VisitorController extends Controller
{
  public function index() {
    $bookTodays = Book::whereDate('date', now())->get();
    $books = Book::query();

    if(request('payment_status') && request('payment_status') != '') {
      $books->wherePayment_status(request('payment_status'));
    }

    if(request('search')) {
      $search = request('search');
      $books->whereHas('members', function($query) use($search) {
        $query->where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%')->orWhere('nik','like','%'.$search.'%')->orWhere('phone','like','%'.$search.'%')->orWhere('age','like','%'.$search.'%')->orWhere('weight','like','%'.$search.'%')->orWhere('country','like','%'.$search.'%')->orWhere('province','like','%'.$search.'%')->orWhere('region','like','%'.$search.'%')->orWhere('city','like','%'.$search.'%')->orWhere('place','like','%'.$search.'%');
      });
    }

    if(request('date')) {
      $books->whereDate('date', request('date'));
    }

    $books = $books->get();

    return view('admin.visitor', compact('bookTodays','books'));
  }
}
