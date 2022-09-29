<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Book;

class DashboardController extends Controller
{
  public function index() {
    $newComers = Book::wherePayment_status('pending')->count();
    $visitorToday = Book::wherePayment_status('settlement')->whereDate('date', now())->count();
    $books = Book::query()->count();
    $income = Book::wherePayment_status('settlement')->sum('total_price');
    return view('admin.dashboard', compact('newComers','visitorToday','books','income'));
  }
}
