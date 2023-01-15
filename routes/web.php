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
Route::get('auth/google', [App\Http\Controllers\Auth\AuthController::class, 'redirectToGoogle']);
Route::get('auth/callback', [App\Http\Controllers\Auth\AuthController::class, 'handleGoogleCallback']);


Route::middleware(['reload.book'])->group(function() {
  Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
  Route::get('/invoice/{book_id}', [App\Http\Controllers\HomeController::class, 'invoice']);
  Route::get('/help', [App\Http\Controllers\HomeController::class, 'help']);
  Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->middleware(['auth']);
  Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->middleware(['auth']);
  Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index']);
  Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
  Route::post('/book', [App\Http\Controllers\BookController::class, 'doBook']);
  Route::post('/book/payment', [App\Http\Controllers\BookController::class, 'toPayment']);
});

Route::get('/book/{book_id}/finish', [App\Http\Controllers\BookController::class, 'finish']);
Route::get('/book/payment', [App\Http\Controllers\BookController::class, 'payment']);
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);


Route::prefix('a')->middleware(['auth','auth.admin'])->group(function() {
  Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
  Route::post('/info/update', [App\Http\Controllers\Admin\DashboardController::class, 'updateInfo']);

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
    // 'age' => '',
    // 'weight' => '',
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
Route::get('get_province', function() {
  $search = request('term');
  return \App\Province::when($search, function($query) use ($search) {
    $query->where('name','like','%'.$search.'%');
  })->limit(50)->get()->map(function($item) {
    $item->id = $item->name;
    $item->text = $item->name;
    return $item;
  })->groupBy('id')->map(function($item,$index) {
    return [
      'id' => $index,
      'text' => $index
    ];
  })->values();
});
Route::get('get_city', function() {
  $search = request('term');
  $province = \App\Province::whereName(request('province'))->first();
  return \App\Regency::when($search, function($query) use ($search) {
    $query->where('name','like','%'.$search.'%');
  })->when($province, function($query) use ($province) {
    $query->whereProvince_id($province->id);
  })->limit(50)->get()->map(function($item) {
    $item->id = $item->name;
    $item->text = $item->name;
    return $item;
  })->groupBy('id')->map(function($item,$index) {
    return [
      'id' => $index,
      'text' => $index
    ];
  })->values();
});
Route::get('get_region', function() {
  $search = request('term');
  $province = \App\Province::whereName(request('province'))->first();
  $city = \App\Regency::whereName(request('city'))->first();
  return \App\District::when($search, function($query) use ($search) {
    $query->where('name','like','%'.$search.'%');
  })->when($province, function($query) use ($province) {
    $query->whereIn('regency_id', $province->regencies->pluck('id'));
  })->when($city, function($query) use ($city) {
    $query->whereRegency_id($city->id);
  })->limit(50)->get()->map(function($item) {
    $item->id = $item->name;
    $item->text = $item->name;
    return $item;
  })->groupBy('id')->map(function($item,$index) {
    return [
      'id' => $index,
      'text' => $index
    ];
  })->values();
});
Route::get('get_place', function() {
  $search = request('term');
  $province = \App\Province::whereName(request('province'))->first();
  $city = \App\Regency::whereName(request('city'))->first();
  $region = \App\District::whereName(request('region'))->first();
  return \App\Village::when($search, function($query) use ($search) {
    $query->where('name','like','%'.$search.'%');
  })->when($province, function($query) use ($province) {
    $cities = $province->regencies;
    $ids = [];
    foreach($cities as $city) {
      foreach($city->districts as $district) {
        $ids[] = $district->id;
      }
    }
    $query->whereIn('district_id',$ids);
  })->when($city, function($query) use ($city) {
    $query->whereIn('district_id',$city->districts->pluck('id'));
  })->when($region, function($query) use ($region) {
    $query->whereDistrict_id($region->id);
  })->limit(50)->get()->map(function($item) {
    $item->id = $item->name;
    $item->text = $item->name;
    return $item;
  })->groupBy('id')->map(function($item,$index) {
    return [
      'id' => $index,
      'text' => $index
    ];
  })->values();
});

Route::post('/book/status/pool', [App\Http\Controllers\BookController::class, 'poolPaymentStatus']);