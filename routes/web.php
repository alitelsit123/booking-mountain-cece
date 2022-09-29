<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'doLogin']);
Route::get('/register', [App\Http\Controllers\Auth\AuthController::class, 'register']);
Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'doRegister']);
Route::get('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout']);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->middleware(['auth']);
Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
Route::post('/book', [App\Http\Controllers\BookController::class, 'doBook']);
Route::get('/book/payment', [App\Http\Controllers\BookController::class, 'payment']);
Route::post('/book/payment', [App\Http\Controllers\BookController::class, 'toPayment']);
Route::get('/book/finish', [App\Http\Controllers\BookController::class, 'finish']);

Route::get('/test-mail', function() {
  \Illuminate\Support\Facades\Mail::to('hikmalkoko3@gmail.com')->send(new \App\Mail\InvoiceEmail);
  return 'Email Sent';
});

Route::prefix('a')->middleware(['auth','auth.admin'])->group(function() {
  Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

  Route::prefix('visitor')->group(function() {
    Route::get('/', [App\Http\Controllers\Admin\VisitorController::class,'index']);
  });
  Route::prefix('user')->group(function() {
    Route::get('/', [App\Http\Controllers\Admin\UserController::class,'index']);
  });
  Route::prefix('finance')->group(function() {
    Route::get('/', [App\Http\Controllers\Admin\FinanceController::class,'index']);
  });

  Route::get('gallery', [App\Http\Controllers\Admin\GalleryController::class, 'index']);
  Route::post('gallery/store', [App\Http\Controllers\Admin\GalleryController::class, 'store']);
  Route::get('gallery/{id}/delete', [App\Http\Controllers\Admin\GalleryController::class, 'destroy']);
  Route::post('gallery/{id}/update_video', [App\Http\Controllers\Admin\GalleryController::class, 'updateVideo']);
  Route::get('gallery/{id}/delete_video', [App\Http\Controllers\Admin\GalleryController::class, 'destroyVideo']);

});

Route::get('get_input_member_template', function() {
  $members = session('members') ?? [];
  $member = collect([
    'id' => uniqid(),
    'name' => '',
    'phone' => '',
    'email' => '',
    'nik' => '',
    'age' => '',
    'weight' => '',
    'country' => 'indonesia',
    'province' => '',
    'city' => '',
    'region' => '',
    'place' => ''
  ]);
  array_push($members, $member);
  session()->put('members', $members);
  return view('components.create-members', compact('member','members'));
});
Route::get('get_members_tamplate/{id}', function($id) {
  $members = session('members');
  $members = collect($members)->where('id', '!=',$id);
  session()->put('members', $members->all());
  // return view('components.new-members', compact('members'));
});
Route::get('create_member/{id}', function($id) {
  $members = session('members');
  $members = collect($members)->where('id', '!=',$id);
  session()->put('members', $members->all());
  return view('components.new-members', compact('members'));
});
