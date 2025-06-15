<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Car;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Menampilkan dashboard admin.
     */
    public function index()
    {
        $totalMobil = Car::count();
        $totalBooking = Booking::count();
        $totalUser = User::where('role', 'user')->count();

        return view('admin.dashboard', compact('totalMobil', 'totalBooking', 'totalUser'));
    }
}
