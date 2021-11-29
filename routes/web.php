<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
    Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'dashboard'])->name('admin');
    // Route::get('/admin', [HomeController::class, 'index'])->name('admin');
    Route::resource('users', UserController::class);
    Route::resource('books', BookController::class);
    Route::resource('rents', RentController::class);
    Route::get('bookreturn', [RentController::class, 'book_return'])->name('book_return');
    Route::get('notreturn', [RentController::class, 'not_return'])->name('not_return');
    Route::put('return/{rent}', [RentController::class, 'is_return'])->name('is_return');
});
