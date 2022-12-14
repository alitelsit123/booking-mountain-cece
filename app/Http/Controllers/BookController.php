<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

use App\Book;
use App\BookMember;
use App\Info;
use App\Services\Midtrans\CreateSnapTokenService;

class BookController extends Controller
{
  public function index() {
    if(!session('date')) {
      return redirect('/');
    }

    $members = session('members');
    return view('book', compact('members'));
  }
  public function doBook() {
    $book_limit = Info::first()->book_limit;
    $incomingDate = explode('/',request('date'));
    $swapDate = $incomingDate[2].'-'.$incomingDate[0].'-'.$incomingDate[1];

    $limit = Book::withCount('members')->whereDate('date',$swapDate)->get()->sum('members_count');
    if($limit >= $book_limit) {
      return back()->with(['book_error' => 'Kuota pengunjung di tanggal '.$swapDate.' sudah penuh.']);
    }
    
    session()->put('book', null);
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
    
    $peoplePrice = Info::first()->price * sizeof($members) + Info::first()->price;

    if(session('book')) {
      $book = Book::find(session('book')['id']);
      $book->date = session('date');
      $book->total_price = $peoplePrice;
      if(!$book->invoice_code) {
        $book->invoice_code = 'INV.'.\time().\mt_rand(0,99).'-'.$leader['nik'];
      }
      $book->save();

      $book->members()->delete();
      if(sizeof($members) > 0) {
        $_ms = collect($members)->map(function($item) {
          unset($item['id']);
          $item['role'] = 'member';
          return $item;
        })->toArray();
        $book->members()->createMany($_ms);
      }
      $_ls = collect($leader)->except(['id'])->toArray();
      $_ls['role'] = 'leader';
      $book->members()->create($_ls);
      session()->put('book', $book);
    } else {
      $book = Book::create([
        'date' => session('date'),
        'total_price' => $peoplePrice,
        'payment_status' => 'pending',
        'payment_success_at' => null,
        'snap_token' => null,
        'invoice_code' => 'INV.'.\time().\mt_rand(0,99).'-'.$leader['nik']
      ]);
      if(sizeof($members) > 0) {
        $_ms = collect($members)->except(['id'])->map(function($item) {
          unset($item['id']);
          $item['role'] = 'member';
          return $item;
        })->toArray();
        $book->members()->createMany($_ms)->toArray();
      }
      $_ls = collect($leader)->except(['id'])->toArray();
      $_ls['role'] = 'leader';
      $book->members()->create($_ls);
      session()->put('book', $book);
    }

    if(!$book->snap_token) {
      $midtrans = new CreateSnapTokenService($book);
      $snapToken = $midtrans->getSnapToken();
      $book->snap_token = $snapToken;
      $book->save();
    }

    session()->put('leader', $leader);
    session()->put('members', $members);
    return redirect('book/payment');
  }
  public function payment() {
    if(request('book_id')) {
      $book = Book::whereInvoice_code(request('book_id'))->firstOrFail();
    } else if(!session('book')) {
      abort(404);
    } else {
      $book = Book::findOrFail(session('book')['id']);
    }
    $leader = $book->members()->whereRole('leader')->first();
    $members = $book->members()->whereRole('member')->get();

    $checkStatusMidtrans = Http::withHeaders([
      'Accept' => 'application/json',
      'Content-Type' => 'application/json',
      'Authorization' => 'Basic '.base64_encode(config('midtrans.server_key'))
    ])->get('https://api.sandbox.midtrans.com/v2/'.$book->invoice_code.'/status');
    $transaction = $checkStatusMidtrans->json();
    if(isset($transaction['transaction_status'])) {
      $book->payment_status = $transaction['transaction_status'];
      $book->payment_success_at = now();
      $book->save();
    }
    return view('book-payment',compact('book','members','leader'));
  }
  public function finish($book_id) {
    $book = Book::findOrFail($book_id);

    $leader = $book->members()->whereRole('leader')->first();
    Mail::to($leader->email)->send(new \App\Mail\InvoiceEmail($book));

    session()->put('leader', null);
    session()->put('members', []);
    session()->put('book', null);
    session()->forget('date');

    return view('finish', compact('book'));
  }
  public function poolPaymentStatus() {
    $book = Book::where('invoice_code',request('book_id'))->first();
    if($book) {
      $checkStatusMidtrans = Http::withHeaders([
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        'Authorization' => 'Basic '.base64_encode(config('midtrans.server_key'))
      ])->get('https://api.sandbox.midtrans.com/v2/'.request('book_id').'/status');
      $transaction = $checkStatusMidtrans->json();
      if(isset($transaction['transaction_status'])) {
        if($transaction['transaction_status'] == 'settlement') {
          $book->payment_status = $transaction['transaction_status'];
          $book->payment_success_at = now();
          $book->save();
        }
        return response()->json([
          'message' => $transaction['transaction_status'],
          'book' => $book,
          'existing_payload' => request()->all()
        ]);
      }
    }
    return response()->json([
      'message' => 'Book not found',
      'existing_payload' => request()->all()
    ]);
  }
}
