@extends('layouts.app')

@section('title', 'Dashboard Booking Customer')

@section('content')
<div class="container-fluid py-4 px-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">📋 Dashboard Booking Customer</h3>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle text-nowrap">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Tgl Booking</th>
                        <th>Merk</th>
                        <th>Tipe</th>
                        <th>Jenis Servis</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($customers as $customer)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            {{ $customer->booking_date 
                                ? \Carbon\Carbon::parse($customer->booking_date)->format('d M Y') 
                                : '-' }}
                        </td>
                        <td>{{ $customer->laptop_brand ?? '-' }}</td>
                        <td>{{ $customer->laptop_type ?? '-' }}</td>
                        <td>
                            <span class="badge bg-info text-dark">
                                {{ $customer->service_type ?? '-' }}
                            </span>
                        </td>
                        <td>{{ $customer->notes ?? '-' }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center text-muted">Tidak ada data booking saat ini.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
