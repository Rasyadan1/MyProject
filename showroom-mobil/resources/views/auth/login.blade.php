<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Google Fonts untuk tipografi modern -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS untuk tema rental mobil premium -->
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1920&q=80') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        /* Container login */
        .bg-white {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            padding: 2.5rem;
            animation: slideIn 1s ease-in;
        }

        /* Heading */
        .text-2xl {
            color: #003087; /* Biru navy */
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        /* Error messages */
        .text-red-600 {
            background-color: rgba(220, 53, 69, 0.1);
            padding: 0.75rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            color: #dc3545;
        }

        /* Labels */
        .text-gray-700 {
            color: #333 !important;
            font-weight: 600;
        }

        /* Inputs */
        .border {
            border-color: #003087 !important; /* Biru navy */
            background-color: #fff !important;
            color: #333 !important;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s, transform 0.2s;
        }

        .border:focus {
            outline: none;
            border-color: #FFD700 !important; /* Emas saat fokus */
            box-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
            background-color: #fff !important;
            color: #333 !important;
            transform: translateY(-2px);
        }

        /* Checkbox */
        .mr-2 {
            accent-color: #003087; /* Biru navy */
        }

        /* Button */
        .bg-blue-600 {
            background-color: #003087 !important; /* Biru navy */
            font-weight: 600;
            transition: background-color 0.3s, transform 0.2s;
        }

        .bg-blue-600:hover {
            background-color: #00205b !important; /* Biru navy lebih gelap */
            transform: translateY(-2px);
        }

        /* Register link */
        .text-blue-600 {
            color: #FFD700 !important; /* Emas */
            font-weight: 500;
        }

        .text-blue-600:hover {
            color: #e6c200 !important; /* Emas lebih gelap */
            text-decoration: underline;
        }

        /* Animasi untuk container */
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsif */
        @media (max-width: 768px) {
            .bg-white {
                padding: 1.5rem;
                margin: 1rem;
            }

            .text-2xl {
                font-size: 1.5rem;
            }

            .border {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded shadow p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded" required autofocus value="{{ old('email') }}">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-gray-700">Remember me</label>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
        </form>
        <div class="mt-4 text-center">
            <a href="/register" class="text-blue-600 hover:underline">Belum punya akun? Register</a>
        </div>
    </div>
</body>
</html>