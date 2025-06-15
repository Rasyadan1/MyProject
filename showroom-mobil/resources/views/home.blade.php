@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Selamat Datang di Rental Mobil Hikaru</h1>
    <p>Pilih mobil favoritmu dan lakukan booking dengan mudah.</p>

    <!-- Custom CSS untuk styling -->
    <style>
        /* Container (diasumsikan dari layouts.app) */
        .container {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            color: #333;
            animation: slideIn 1s ease-in;
            text-align: center;
        }

        /* Heading */
        h1 {
            color: #003087; /* Biru navy */
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            animation: fadeInUp 0.5s ease-in;
        }

        /* Paragraf */
        p {
            color: #555;
            font-family: 'Montserrat', sans-serif;
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            animation: fadeInUp 0.7s ease-in;
        }

        /* Animasi */
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsif */
        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
                margin: 1rem;
            }

            h1 {
                font-size: 1.8rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</div>
@endsection