@extends('layouts.app')

@section('content')
<style>
    /* Table styling */
    .table {
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .table-bordered {
        border: none;
    }

    .table thead {
        background-color: #003087; /* Navy blue */
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table th, .table td {
        padding: 1rem;
        vertical-align: middle;
        border: 1px solid #dee2e6;
    }

    .table tbody tr {
        transition: background-color 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa; /* Light gray on hover */
    }

    /* Badge styling */
    .badge {
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        font-weight: 500;
    }

    .bg-warning {
        background-color: #ffc107 !important;
        color: #333 !important;
    }

    .bg-success {
        background-color: #28a745 !important;
        color: #fff !important;
    }

    .bg-danger {
        background-color: #dc3545 !important;
        color: #fff !important;
    }

    /* Alert styling */
    .alert-success {
        background-color: rgba(40, 167, 69, 0.1);
        border-color: #28a745;
        color: #28a745;
        border-radius: 6px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    /* Heading styling */
    h2 {
        font-weight: 700;
        color: #003087; /* Navy blue */
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* No bookings message */
    p {
        color: #555;
        font-size: 1rem;
        font-weight: 500;
        margin-top: 1.5rem;
    }

    /* Container animation */
    .container {
        animation: slideIn 1s ease-in;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .table th, .table td {
            padding: 0.75rem;
            font-size: 0.9rem;
        }

        .badge {
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
        }
    }
</style>

<div class="container mt-4">
    <h2>Daftar Booking Rental Mobil</h2>

    {{-- Display success message --}}

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">+ Booking Test Drive</a> --}}

    @if($bookings->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mobil</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->car->name }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->test_drive_date)->format('d-m-Y') }}</td>
                <td>
                    @if($booking->status == 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($booking->status == 'approved')
                        <span class="badge bg-success">Disetujui</span>
                    @else
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Belum ada booking rental</p>
    @endif
</div>
@endsection