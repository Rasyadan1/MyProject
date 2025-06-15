@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detail Mobil</h2>

    <div class="card">
        @if($car->image)
            <div class="img-wrapper">
                <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="Car Image">
            </div>
        @endif
        <div class="card-body">
            <h4>{{ $car->name }}</h4>
            <p><strong>Merk:</strong> {{ $car->brand }}</p>
            <p><strong>Tahun:</strong> {{ $car->year }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($car->price) }}</p>
            <p>{{ $car->description }}</p>
            @auth
                @if(auth()->user()->role === 'customer')
                    <a href="{{ route('booking.create', $car->id) }}" class="btn btn-primary">Booking Rental Mobil</a>
                @endif
            @endauth
            <a href="{{ route('cars.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <!-- CSS -->
    <style>
        .container {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #003087;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
        }

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .img-wrapper {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            overflow: hidden;
            background: #f9f9f9;
        }

        .card-img-top {
            display: block;
            max-width: 100%;
            height: auto;
            object-fit: contain;
            transition: transform 0.4s ease;
        }

        .img-wrapper:hover .card-img-top {
            transform: scale(1.05);
        }

        .card-body {
            padding: 2rem;
        }

        .card-body h4 {
            color: #003087;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .card-body p {
            color: #555;
            font-size: 1rem;
            line-height: 1.6;
        }

        .btn-primary {
            background-color: #003087 !important;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
        }

        .btn-secondary {
            background-color: #6c757d !important;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .img-wrapper {
                max-width: 100%;
            }

            .card-body {
                padding: 1.5rem;
            }

            .btn {
                font-size: 0.9rem;
                padding: 0.5rem 1rem;
            }
        }
    </style>
</div>
@endsection
