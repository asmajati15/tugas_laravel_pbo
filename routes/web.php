<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard', UserController::class)->name('*','dashboard')->middleware('auth');
// Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard.admin')->middleware('auth');
Route::get('login', [AdminController::class, 'login'])->name('login.admin')->middleware('guest');
Route::post('login-post', [AdminController::class, 'authenticate'])->name('login.post');
Route::post('logout-post', [AdminController::class, 'logout'])->name('logout.admin')->middleware('auth');
Route::get('signup', [AdminController::class, 'signup'])->name('signup.admin')->middleware('guest');
Route::post('signup-post', [AdminController::class, 'store'])->name('signup.post');

