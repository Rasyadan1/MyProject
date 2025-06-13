@extends('layouts.app')

@section('title', 'Booking Servis Laptop')

@section('content')
    <h2 style="font-size: 24px; margin-bottom: 20px; text-align: center;">Tambah Pengguna</h2>

    {{-- Tampilkan pesan sukses jika ada --}}
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tampilkan error validasi jika ada --}}
    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- 1. Isi form action agar data dapat di proses di controller --}}
    <form action="{{ route('customers.store') }}" method="POST" style="max-width: 500px; margin: 0 auto; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); background-color: #fff;">
            @csrf
    
            <div style="margin-bottom: 15px;">
                <label for="customer_name" style="display: block; font-weight: bold; margin-bottom: 5px;">Nama Pelanggan:</label>
                <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
            </div>
    
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
            </div>
    
            <div style="margin-bottom: 15px;">
                <label for="phone" style="display: block; font-weight: bold; margin-bottom: 5px;">Telepon:</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
            </div>
    
            <div style="margin-bottom: 15px;">
                <label for="laptop_brand" style="display: block; font-weight: bold; margin-bottom: 5px;">Merk Laptop:</label>
                <input type="text" id="laptop_brand" name="laptop_brand" value="{{ old('laptop_brand') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
            </div>
    
            <div style="margin-bottom: 15px;">
                <label for="laptop_type" style="display: block; font-weight: bold; margin-bottom: 5px;">Tipe Laptop:</label>
                <input type="text" id="laptop_type" name="laptop_type" value="{{ old('laptop_type') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
            </div>
    
            <div style="margin-bottom: 15px;">
                <label for="service_type" style="display: block; font-weight: bold; margin-bottom: 5px;">Jenis Servis:</label>
                <select id="service_type" name="service_type" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
                    <option value="">-- Pilih Servis --</option>
                    <option value="Ganti Keyboard" {{ old('service_type') == 'Ganti Keyboard' ? 'selected' : '' }}>Ganti Keyboard</option>
                    <option value="Install Ulang OS" {{ old('service_type') == 'Install Ulang OS' ? 'selected' : '' }}>Install Ulang OS</option>
                    <option value="Perbaikan Hardware" {{ old('service_type') == 'Perbaikan Hardware' ? 'selected' : '' }}>Perbaikan Hardware</option>
                    <option value="Pembersihan" {{ old('service_type') == 'Pembersihan' ? 'selected' : '' }}>Pembersihan</option>
                    <option value="Lainnya" {{ old('service_type') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>
    
            <div style="margin-bottom: 15px;">
                <label for="booking_date" style="display: block; font-weight: bold; margin-bottom: 5px;">Tanggal Booking:</label>
                <input type="date" id="booking_date" name="booking_date" value="{{ old('booking_date') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
            </div>
    
            <div style="margin-bottom: 15px;">
                <label for="notes" style="display: block; font-weight: bold; margin-bottom: 5px;">Catatan Tambahan:</label>
                <textarea id="notes" name="notes" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">{{ old('notes') }}</textarea>
            </div>
    
            <button type="submit" style="background-color: #2196f3; color: white; padding: 12px 20px; border-radius: 5px; font-size: 16px; width: 100%; cursor: pointer; border: none; transition: background-color 0.3s;">
                Booking Servis
            </button>
        </form>
@endsection
