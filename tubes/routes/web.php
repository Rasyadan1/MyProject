<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', fn() => view('welcome'));

/// 1. Tambahkan route untuk menampilkan daftar pengguna
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

// 2. Tambahkan route untuk menampilkan form tambah pengguna
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');

// 3. Tambahkan route untuk menyimpan pengguna baru
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');

// 5. Tambahkan route untuk menyimpan perubahan pengguna
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');

// 6. Tambahkan route untuk menghapus pengguna
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::resource('customers', CustomerController::class);
