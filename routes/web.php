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

Route::prefix('a')->middleware(['auth','auth.admin'])->group(function() {
  Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

  Route::get('gallery', [App\Http\Controllers\Admin\GalleryController::class, 'index']);
  Route::post('gallery/store', [App\Http\Controllers\Admin\GalleryController::class, 'store']);
  Route::get('gallery/{id}/delete', [App\Http\Controllers\Admin\GalleryController::class, 'destroy']);
  Route::post('gallery/{id}/update_video', [App\Http\Controllers\Admin\GalleryController::class, 'updateVideo']);
  Route::get('gallery/{id}/delete_video', [App\Http\Controllers\Admin\GalleryController::class, 'destroyVideo']);

});
