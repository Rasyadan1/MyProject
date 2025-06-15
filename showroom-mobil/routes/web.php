<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// =========================
// ROUTE UNTUK USER LOGIN
// =========================
Route::middleware(['auth'])->group(function () {
    // Tampilkan semua mobil
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

    // Detail mobil
    Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

    // Booking mobil
    Route::get('/booking/create/{car}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

    // Riwayat booking user
    Route::get('/my-bookings', [BookingController::class, 'userBookings'])->name('booking.user');
});

// =========================
// ROUTE KHUSUS ADMIN
// =========================
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function () {
    // Dashboard admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // Kelola data mobil (CRUD)
    Route::get('/cars', [CarController::class, 'adminIndex'])->name('admin.cars.index');
    Route::get('/cars/create', [CarController::class, 'create'])->name('admin.cars.create');
    Route::post('/cars', [CarController::class, 'store'])->name('admin.cars.store');
    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('admin.cars.edit');
    Route::put('/cars/{car}', [CarController::class, 'update'])->name('admin.cars.update');
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('admin.cars.destroy');

    // Kelola booking pengguna
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings.index');
    Route::put('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
});

Route::patch('/admin/bookings/{booking}/approve', [App\Http\Controllers\Admin\BookingAdminController::class, 'approve'])->name('admin.bookings.approve');
Route::patch('/admin/bookings/{booking}/reject', [App\Http\Controllers\Admin\BookingAdminController::class, 'reject'])->name('admin.bookings.reject');
require __DIR__.'/auth.php';
