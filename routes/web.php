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

Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);
Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'doLogin']);
Route::get('/register', [App\Http\Controllers\Auth\AuthController::class, 'register']);
Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'doRegister']);
Route::get('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::prefix('a')->group(function() {
  Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
});
