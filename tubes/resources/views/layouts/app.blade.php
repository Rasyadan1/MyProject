<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Service Center</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Custom Style --}}
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #0d6efd;
            color: white;
            padding: 20px;
            position: fixed;
            width: 220px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 15px 0;
        }
        .sidebar a:hover {
            background-color: #0b5ed7;
            padding-left: 10px;
            border-radius: 4px;
        }
        .main-content {
            margin-left: 240px;
            padding: 30px;
        }
    </style>
</head>
<body>
    {{-- Sidebar --}}
    <div class="sidebar">
        <h4 class="mb-4"><i class="bi bi-laptop"></i> Service Center</h4>
        <a href="{{ route('customers.index') }}"><i class="bi bi-house-door"></i> Dashboard</a>
        <a href="{{ route('customers.create') }}"><i class="bi bi-plus-circle"></i> Tambah Booking</a>
        <hr style="border-color: rgba(255,255,255,0.2);">
        <small>Service Center Pondok Hikaru</small>
    </div>

    {{-- Main Content --}}
    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
