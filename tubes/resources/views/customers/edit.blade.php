@extends('layouts.app')

@section('title', 'Edit Booking Customer')

@section('content')
<div class="container">
    <div class="mb-4">
        <h3>Edit Data Booking</h3>
        <p class="text-muted">Ubah informasi customer dengan benar.</p>
    </div>

    {{-- Alert jika ada error validasi --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Edit --}}
    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nama Pelanggan</label>
                        <input type="text" name="name" value="{{ old('name', $customer->name) }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email', $customer->email) }}" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Telepon</label>
                        <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" name="address" value="{{ old('address', $customer->address) }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="booking_date" class="form-label">Tanggal Booking</label>
                        <input type="date" name="booking_date" value="{{ old('booking_date', $customer->booking_date) }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="laptop_brand" class="form-label">Merk Laptop</label>
                        <input type="text" name="laptop_brand" value="{{ old('laptop_brand', $customer->laptop_brand) }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="laptop_type" class="form-label">Tipe Laptop</label>
                        <input type="text" name="laptop_type" value="{{ old('laptop_type', $customer->laptop_type) }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="service_type" class="form-label">Jenis Servis</label>
                        <select name="service_type" class="form-select" required>
                            <option value="">-- Pilih Servis --</option>
                            @foreach(['Ganti Keyboard', 'Install Ulang OS', 'Perbaikan Hardware', 'Pembersihan', 'Lainnya'] as $service)
                                <option value="{{ $service }}" {{ old('service_type', $customer->service_type) == $service ? 'selected' : '' }}>
                                    {{ $service }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="notes" class="form-label">Catatan Tambahan</label>
                        <textarea name="notes" class="form-control" rows="3">{{ old('notes', $customer->notes) }}</textarea>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
