@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Manajemen Booking Test Drive</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($bookings->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Mobil</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->user->name ?? 'user null' }}</td>
                <td>{{ $booking->car->name ?? 'car null' }}</td>
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
                <td>
                    @if($booking->status === 'pending')
                    <form action="{{ route('admin.bookings.approve', $booking) }}" method="POST" class="d-inline">
                        @csrf @method('PATCH')
                        <button class="btn btn-success btn-sm">Setujui</button>
                    </form>
                    <form action="{{ route('admin.bookings.reject', $booking) }}" method="POST" class="d-inline">
                        @csrf @method('PATCH')
                        <button class="btn btn-danger btn-sm">Tolak</button>
                    </form>
                    @else
                        <em>Tindakan selesai</em>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Tidak ada booking saat ini.</p>
    @endif

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
        }

        /* Heading */
        h2 {
            color: #003087; /* Biru navy */
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 1.5rem;
        }

        /* Alert success */
        .alert-success {
            background-color: rgba(40, 167, 69, 0.1);
            border-color: #28a745;
            color: #28a745;
            font-weight: 500;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            animation: fadeIn 0.5s ease-in;
        }

        /* Table styling */
        .table {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-bordered {
            border: none;
        }

        .table thead {
            background-color: #003087; /* Biru navy */
            color: #fff;
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem;
            border: none;
        }

        .table tbody tr {
            transition: background-color 0.3s;
            animation: fadeInUp 0.5s ease-in;
        }

        .table tbody tr:hover {
            background-color: rgba(0, 48, 135, 0.05);
        }

        .table td {
            padding: 1rem;
            vertical-align: middle;
            border-color: rgba(0, 0, 0, 0.1);
        }

        /* Badge styling */
        .badge {
            font-size: 0.85rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }

        .bg-warning {
            background-color: #FFD700 !important; /* Emas untuk pending */
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

        /* Button styling */
        .btn-success {
            background-color: #28a745 !important;
            border: none;
            font-weight: 600;
            border-radius: 6px;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-success:hover {
            background-color: #218838 !important;
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: #dc3545 !important;
            border: none;
            font-weight: 600;
            border-radius: 6px;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-danger:hover {
            background-color: #b02a37 !important;
            transform: translateY(-2px);
        }

        /* Empty state */
        p {
            color: #333;
            font-size: 1.1rem;
            font-style: italic;
            text-align: center;
            padding: 2rem;
            background: rgba(0, 48, 135, 0.05);
            border-radius: 8px;
            animation: fadeIn 0.5s ease-in;
        }

        /* Animasi */
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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

            .table {
                font-size: 0.9rem;
            }

            .table th, .table td {
                padding: 0.75rem;
            }

            .btn-sm {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
            }

            .badge {
                font-size: 0.75rem;
                padding: 0.4rem 0.8rem;
            }

            p {
                font-size: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</div>
@endsection