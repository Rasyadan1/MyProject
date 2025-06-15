<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('customer')->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create(Car $car)
    {
        return view('bookings.create', compact('car'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'test_drive_date' => 'required|date|after_or_equal:today',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'car_id' => $request->car_id,
            'test_drive_date' => $request->test_drive_date,
            'status' => 'pending',
        ]);

        return redirect()->route('booking.user')->with('success', 'Booking test drive berhasil diajukan.');
    }

    public function userBookings()
    {
        $bookings = Booking::where('user_id', auth()->id())->with('car')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function adminIndex()
    {
    $bookings = Booking::with(['car', 'user'])
        ->whereHas('user', function ($query) {
            $query->where('role', '!=', 'admin');
        })
        ->latest()
        ->get();

    return view('admin.bookings.index', compact('bookings'));
    }

    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'disetujui';
        $booking->save();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking telah disetujui.');
    }
}
