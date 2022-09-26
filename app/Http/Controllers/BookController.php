<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use App\BookMember;
use App\Installment;

class BookController extends Controller
{
  public function index() {
    // session()->put('members', []);
    $members = session('members');
    return view('book', compact('members'));
  }
  public function doBook() {
    $incomingDate = explode('/',request('date'));
    $swapDate = $incomingDate[2].'-'.$incomingDate[1].'-'.$incomingDate[0];
    session()->put('date', $swapDate);
    return redirect('book');
  }
  public function toPayment() {
    $params = request()->except(['_token']);
    $leader = [];
    foreach($params as $key => $row) {
      if(strpos($key,'leader_') !== false) {
        $leader[str_replace('leader_', '', $key)] = $row;
      }
    }
    $memberIds = request('ids');
    $members = [];
    if($memberIds && sizeof($memberIds) > 0) {
      foreach($memberIds as $id) {
        $memberItem = ['id' => $id];
        foreach($params as $key => $row) {
          if(strpos($key,'leader_') === false && $key !== 'ids') {
            $memberItem[str_replace('_'.$id, '', $key)] = $row;
          }
        }
        array_push($members,$memberItem);
      }
    }
    
    $peoplePrice = Installment::first()->price * sizeof($members) + Installment::first()->price;

    if(session('book')) {
      $existingBook = Book::find(session('book')['id']);
      $existingBook->date = session('date');
      $existingBook->total_price = $peoplePrice;
      $existingBook->save();

      $existingBook->members()->delete();
      if(sizeof($members) > 0) {
        $_ms = collect($members)->map(function($item) {
          unset($item['id']);
          $item['role'] = 'member';
          return $item;
        })->toArray();
        $existingBook->members()->createMany($_ms);
        $_ls = collect($leader)->except(['id'])->toArray();
        $_ls['role'] = 'leader';
        $existingBook->members()->create($_ls);
      }

      session()->put('book', $existingBook);
    } else {
      $book = Book::create([
        'date' => session('date'),
        'total_price' => $peoplePrice,
        'payment_status' => 'pending',
        'payment_success_at' => null,
        'snap_token' => null
      ]);
      if(sizeof($members) > 0) {
        $_ms = collect($members)->except(['id'])->map(function($item) {
          unset($item['id']);
          $item['role'] = 'member';
          return $item;
        })->toArray();
        $_ms['role'] = 'member';
        $book->members()->createMany($_ms)->toArray();
        $_ls = collect($leader)->except(['id'])->toArray();
        $_ls['role'] = 'leader';
        $book->members()->create($_ls);
      }
      session()->put('book', $book);
    }


    session()->put('leader', $leader);
    session()->put('members', $members);
    return redirect('book/payment');
  }
  public function payment() {
    $book = Book::find(session('book')['id']);
    $leader = $book->members()->whereRole('leader')->first();
    $members = $book->members()->whereRole('member')->get();
    return view('book-payment',compact('book','members','leader'));
  }
}
