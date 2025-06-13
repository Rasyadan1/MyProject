<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Pemesanan Booking')</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: linear-gradient(90deg, #43cea2 60%, #185a9d 100%);
            color: white;
            padding: 24px 40px;
            box-shadow: 0 2px 10px rgba(67,206,162,0.10);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
            letter-spacing: 1px;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 18px;
            font-weight: 600;
            padding: 10px 22px;
            border-radius: 8px;
            background: rgba(255,255,255,0.10);
            transition: background 0.2s, transform 0.2s;
            box-shadow: 0 2px 8px rgba(67,206,162,0.07);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        nav a:last-child {
            margin-right: 0;
        }

        nav a:hover {
            background: #185a9d;
            transform: translateY(-2px) scale(1.04);
        }

        .container {
            max-width: 900px;
            margin: 40px auto 0 auto;
            background-color: #fff;
            padding: 40px 36px 36px 36px;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(67,206,162,0.10);
            min-height: 420px;
        }

        .alert {
            padding: 14px 20px;
            background-color: #e0f7fa;
            color: #00695c;
            margin-bottom: 24px;
            border-left: 7px solid #43cea2;
            border-radius: 8px;
            font-size: 16px;
        }

        .footer {
            background: linear-gradient(90deg, #43cea2 60%, #185a9d 100%);
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-size: 16px;
            margin-top: auto;
            box-shadow: 0 -2px 10px rgba(67,206,162,0.10);
        }

        @media (max-width: 600px) {
            .container {
                padding: 18px 8px;
            }
            header {
                flex-direction: column;
                align-items: flex-start;
                padding: 18px 12px;
            }
            nav a {
                padding: 8px 10px;
                font-size: 15px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Aplikasi Pemesanan Booking</h1>
        <nav>
            <a href="{{ route('customers.index') }}">🗓️ Daftar Booking</a>
            <a href="{{ route('customers.create') }}">➕ Buat Booking</a>
        </nav>
    </header>

    <div class="container">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Universitas EAD - Praktikum Web Application Development
    </div>

</body>
</html>
