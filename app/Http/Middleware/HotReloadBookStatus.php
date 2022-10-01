<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Http;

class HotReloadBookStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $_s_b = session('book');
      if($_s_b) {
        $book = \App\Book::find(session('book')['id']);
        if($book) {
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

            if($transaction['transaction_status'] === 'settlement') {
              session()->put('leader', null);
              session()->put('members', []);
              session()->put('book', null);
              session()->forget('date');
            }
          }
        }
      }

      return $next($request);
    }
}
