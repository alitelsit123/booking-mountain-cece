<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Book;
use App\Info;

class DashboardController extends Controller
{
  public function index() {
    $newComers = Book::whereDate('date', '>', now())->wherePayment_status('settlement')->count();
    $visitorToday = Book::wherePayment_status('settlement')->whereDate('date', now())->count();
    $books = Book::query()->count();
    $income = Book::wherePayment_status('settlement')->sum('total_price');
    $info = Info::first();
    return view('admin.dashboard', compact('newComers','visitorToday','books','income','info'));
  }
  public function updateInfo() {
    $info = Info::findOrFail(request('info_id'));
    $info->price = request('price');
    $info->book_limit = request('book_limit');
    $info->save();

    return redirect('/a');
  }
}
