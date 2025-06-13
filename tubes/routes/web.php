<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', fn() => view('welcome'));

/// 1. Tambahkan route untuk menampilkan daftar pengguna
// Tanpa show:
Route::resource('customers', CustomerController::class)->except(['show']);

