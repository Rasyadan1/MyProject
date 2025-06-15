@extends('layouts.app')

@section('content')
<style>
    .image-wrapper {
        width: 100%;
        max-height: 300px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f9f9f9;
        padding: 10px;
        cursor: pointer;
    }

    .card-img-top {
        width: 100%;
        height: auto;
        object-fit: contain;
        transition: transform 0.3s ease-in-out;
    }

    .card-img-top:hover {
        transform: scale(1.05);
    }

    .modal-img {
        max-width: 100%;
        max-height: 80vh;
        margin: auto;
        display: block;
    }

    .modal-content {
        background: transparent;
        border: none;
        text-align: center;
    }

    .modal-header {
        border-bottom: none;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-title {
        font-weight: 600;
        color: #003087;
    }

    .card-text {
        color: #555;
        font-size: 0.95rem;
    }

    .btn {
        font-weight: 500;
        border-radius: 6px;
    }

    .btn-primary {
        background-color: #003087;
        border: none;
    }

    .btn-primary:hover {
        background-color: #002060;
    }

    .btn-info, .btn-warning, .btn-danger {
        border: none;
    }

    h2 {
        font-weight: 700;
        color: #003087;
        margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
        .image-wrapper {
            max-height: 200px;
        }

        .btn {
            font-size: 0.85rem;
        }
    }
</style>

<div class="container mt-4">
    <h2>Daftar Mobil Rental</h2>

    <form action="{{ route('cars.index') }}" method="GET" class="mb-4 d-flex" role="search">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari nama atau merk mobil..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.cars.create') }}" class="btn btn-primary mb-3">+ Tambah Mobil</a>
        @endif
    @endauth

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse($cars as $car)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($car->image)
                    <div class="image-wrapper" onclick="openModal('{{ asset('storage/' . $car->image) }}')">
                        <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top img-fluid" alt="Car Image">
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->name }}</h5>
                        <p class="card-text">
                            {{ $car->brand }} - {{ $car->year }}<br>
                            <strong>Rp {{ number_format($car->price) }} / Minggu</strong>
                        </p>
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info btn-sm">Detail</a>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">Mobil tidak ditemukan.</div>
            </div>
        @endforelse
    </div>
</div>

<!-- Modal Fullscreen -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
            <img src="" id="modalImage" class="modal-img" alt="Zoomed Image">
        </div>
    </div>
  </div>
</div>

<script>
    function openModal(imageSrc) {
        const modalImage = document.getElementById('modalImage');
        modalImage.src = imageSrc;
        const modal = new bootstrap.Modal(document.getElementById('imageModal'));
        modal.show();
    }
</script>
@endsection
