<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang - Service Laptop</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', Arial, sans-serif;
            background: linear-gradient(135deg, #e3f2fd 0%, #90caf9 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: #fff;
            padding: 48px 40px 40px 40px;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(30,136,229,0.18), 0 1.5px 4px rgba(0,0,0,0.08);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .logo {
            width: 90px;
            margin-bottom: 24px;
            filter: drop-shadow(0 2px 8px rgba(30,136,229,0.12));
        }
        h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1e88e5;
            margin-bottom: 18px;
            letter-spacing: 1px;
        }
        p {
            color: #333;
            margin-bottom: 32px;
            font-size: 1.08rem;
        }
        .btn {
            display: inline-block;
            padding: 12px 32px;
            background: linear-gradient(90deg, #1e88e5 60%, #42a5f5 100%);
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1.08rem;
            box-shadow: 0 2px 8px rgba(30,136,229,0.12);
            transition: background 0.2s, transform 0.2s;
        }
        .btn:hover {
            background: linear-gradient(90deg, #1565c0 60%, #1976d2 100%);
            transform: translateY(-2px) scale(1.04);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Service Center Kelompok 4</h1>
        <p>Silakan klik tombol di bawah untuk menuju halaman Booking Service Laptop.</p>
        <a href="{{ route('customers.index') }}" class="btn">Booking Sekarang!</a>
    </div>
</body>
</html>
