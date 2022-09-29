<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Book;

class FinanceController extends Controller
{
  public function index() {
    $profit = Book::wherePayment_status('settlement')->sum('total_price');
    $pending = Book::wherePayment_status('pending')->sum('total_price');
    $transactions = Book::all();
    return view('admin.finance', compact('profit','pending', 'transactions'));
  }
}
