<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showroom Mobil</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts untuk tipografi modern -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS untuk tema rental mobil -->
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        /* Navbar styling (kompatibel dengan partials.navbar) */
        .navbar {
            background-color: rgba(0, 48, 135, 0.9); /* Biru navy */
            border-bottom: 2px solid #FFD700; /* Aksen emas */
        }

        .navbar-brand {
            font-weight: 700;
            color: #FFD700 !important; /* Emas */
        }

        .nav-link {
            color: #fff !important;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #FFD700 !important; /* Emas saat hover */
        }

        .btn-link {
            color: #fff !important;
            text-decoration: none;
            font-weight: 500;
        }

        .btn-link:hover {
            color: #FFD700 !important;
        }

        /* Main content styling */
        main {
            min-height: 80vh;
            display: flex;
            align-items: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.97); /* Putih dengan transparansi minimal */
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            color: #333;
            animation: slideIn 1s ease-in;
        }

        /* Animasi untuk container */
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsif */
        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
            }

            .navbar-nav {
                text-align: center;
                background-color: rgba(0, 48, 135, 0.95);
                padding: 1rem;
                border-radius: 8px;
                margin-top: 0.5rem;
            }

            .nav-item {
                margin: 0.5rem 0;
            }
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Main content --}}
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>