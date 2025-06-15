@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Dashboard Admin</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <canvas id="dashboardChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total Mobil', 'Total Booking'],
            datasets: [{
                label: 'Statistik Data',
                data: [{{ $totalMobil }}, {{ $totalBooking }}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',    // Mobil
                    'rgba(75, 192, 192, 0.7)'     // Booking
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>
@endsection
