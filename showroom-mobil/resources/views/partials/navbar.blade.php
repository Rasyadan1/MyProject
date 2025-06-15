<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        {{-- Logo kiri --}}
        <a class="navbar-brand" href="{{ url('/') }}">Rental Mobil Hikaru</a>

        {{-- Toggler untuk mode mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Konten navbar --}}
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            {{-- Menu tengah --}}
            <ul class="navbar-nav mx-auto d-flex justify-content-center">
                @auth
                    @if (auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.bookings.index') }}">Manajemen Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cars.index') }}">Kelola Mobil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Lihat Statistik</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cars.index') }}">Lihat Mobil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('booking.user') }}">Booking Saya</a>
                        </li>
                    @endif
                @endauth
            </ul>

            {{-- Menu kanan: Login / Logout --}}
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="nav-link btn btn-link" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar {
        background-color: rgba(0, 48, 135, 0.9) !important;
        border-bottom: 2px solid #FFD700;
        font-family: 'Montserrat', sans-serif;
    }

    .navbar-brand {
        font-weight: 700;
        color: #FFD700 !important;
        transition: transform 0.3s;
    }

    .navbar-brand:hover {
        transform: scale(1.05);
    }

    .nav-link {
        color: #fff !important;
        font-weight: 500;
        padding: 0.5rem 1rem;
        transition: color 0.3s, background-color 0.3s;
    }

    .nav-link:hover {
        color: #FFD700 !important;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 5px;
    }

    .btn-link {
        color: #fff !important;
        text-decoration: none;
        font-weight: 500;
        padding: 0.5rem 1rem;
    }

    .btn-link:hover {
        color: #FFD700 !important;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 5px;
    }

    .navbar-toggler {
        border-color: #FFD700;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 215, 0, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .navbar-nav .nav-item {
        margin: 0 5px;
    }

    @media (max-width: 768px) {
        .navbar-nav {
            text-align: center;
            background-color: rgba(0, 48, 135, 0.95);
            padding: 1rem;
            border-radius: 10px;
            margin-top: 0.5rem;
        }

        .nav-item {
            margin: 0.5rem 0;
        }

        .nav-link, .btn-link {
            padding: 0.75rem;
        }
    }
</style>
