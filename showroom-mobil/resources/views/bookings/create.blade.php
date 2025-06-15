@extends('layouts.app')

@section('content')
<style>
    /* Form styling */
    .form-label {
        font-weight: 600;
        color: #003087; /* Navy blue */
        margin-bottom: 0.5rem;
    }

    .form-control {
        border: 1px solid #003087; /* Navy blue border */
        border-radius: 6px;
        padding: 0.75rem;
        font-size: 0.95rem;
        background-color: #f8f9fa; /* Light gray background */
        color: #333;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #FFD700; /* Gold on focus */
        box-shadow: 0 0 8px rgba(255, 215, 0, 0.3);
        outline: none;
    }

    .form-control[readonly] {
        background-color: #e9ecef;
        cursor: not-allowed;
    }

    /* Button styling */
    .btn {
        font-weight: 500;
        border-radius: 6px;
        padding: 0.75rem 1.5rem;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-primary {
        background-color: #003087; /* Navy blue */
        border-color: #003087;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #FFD700; /* Gold on hover */
        border-color: #FFD700;
        color: #003087;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
    }

    .btn-secondary:hover {
        background-color: #FFD700;
        border-color: #FFD700;
        color: #003087;
    }

    /* Alert styling */
    .alert-danger {
        background-color: rgba(220, 53, 69, 0.1);
        border-color: #dc3545;
        color: #dc3545;
        border-radius: 6px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .alert-danger ul {
        margin: 0;
        padding-left: 1.5rem;
    }

    /* Heading styling */
    h2 {
        font-weight: 700;
        color: #003087; /* Navy blue */
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Form container */
    .container {
        animation: slideIn 1s ease-in;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .form-control {
            padding: 0.65rem;
            font-size: 0.9rem;
        }

        .btn {
            padding: 0.65rem 1.25rem;
            font-size: 0.9rem;
        }
    }
</style>

<div class="container mt-4">
    <h2>Booking Rental Mobil</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Mobil</label>
            <input type="hidden" name="car_id" value="{{ $car->id }}">
            <input type="text" class="form-control" value="{{ $car->name }} - {{ $car->brand }}" readonly>
        </div>
        <div class="mb-3">
            <label for="test_drive_date" class="form-label">Tanggal Booking Rental</label>
            <input type="date" name="test_drive_date" class="form-control" required min="{{ date('Y-m-d') }}">
        </div>
        <button class="btn btn-primary">Ajukan Booking</button>
        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection