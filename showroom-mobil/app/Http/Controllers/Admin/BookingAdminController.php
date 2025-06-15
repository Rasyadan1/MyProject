<?php

// app/Http/Controllers/Admin/BookingAdminController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingAdminController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['car', 'user'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function approve(Booking $booking)
    {
        $booking->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Booking disetujui.');
    }

    public function reject(Booking $booking)
    {
        $booking->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Booking ditolak.');
    }
}

