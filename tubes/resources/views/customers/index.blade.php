@extends('layouts.app')

@section('title', 'Daftar Booking Customer')

@section('content')
<div style="max-width: 1100px; margin: 30px auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h2 style="margin: 0; color: #222;">Daftar Booking Customer</h2>
        <!-- Tombol Tambah Customer dihapus -->
    </div>
    <div style="background: #fff; border-radius: 12px; box-shadow: 0 2px 16px rgba(0,0,0,0.07); padding: 24px;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="padding: 14px; text-align: left; background-color: #f4f6f9; color: #333; border-bottom: 2px solid #e0e0e0;">No</th>
                    <th style="padding: 14px; text-align: left; background-color: #f4f6f9; color: #333; border-bottom: 2px solid #e0e0e0;">Nama Customer</th>
                    <th style="padding: 14px; text-align: left; background-color: #f4f6f9; color: #333; border-bottom: 2px solid #e0e0e0;">Email</th>
                    <th style="padding: 14px; text-align: left; background-color: #f4f6f9; color: #333; border-bottom: 2px solid #e0e0e0;">Telepon</th>
                    <th style="padding: 14px; text-align: left; background-color: #f4f6f9; color: #333; border-bottom: 2px solid #e0e0e0;">Alamat</th>
                    <th style="padding: 14px; text-align: left; background-color: #f4f6f9; color: #333; border-bottom: 2px solid #e0e0e0;">Tanggal Booking</th>
                    <th style="padding: 14px; text-align: left; background-color: #f4f6f9; color: #333; border-bottom: 2px solid #e0e0e0;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr style="background-color: #fafbfc; border-bottom: 1px solid #eee;">
                    <td style="padding: 12px;">{{ $loop->iteration }}</td>
                    <td style="padding: 12px;">{{ $customer->name }}</td>
                    <td style="padding: 12px;">{{ $customer->email }}</td>
                    <td style="padding: 12px;">{{ $customer->phone }}</td>
                    <td style="padding: 12px;">{{ $customer->address }}</td>
                    <td style="padding: 12px;">{{ $customer->booking_date ?? '-' }}</td>
                    <td style="padding: 12px;">
                        @if(isset($customer->status))
                            <span style="padding: 4px 10px; border-radius: 4px; background: {{ $customer->status == 'confirmed' ? '#4caf50' : '#ffc107' }}; color: #fff;">
                                {{ ucfirst($customer->status) }}
                            </span>
                        @else
                            <span style="color: #888;">-</span>
                        @endif
                    </td>
                    <td style="padding: 12px;">
                        <a href="{{ route('customers.edit', $customer->id) }}" style="padding: 8px 16px; font-size: 14px; border-radius: 5px; background-color: #ffa500; color: white; border: none; cursor: pointer; text-decoration: none; margin-right: 6px; box-shadow: 0 1px 4px rgba(255,165,0,0.10);">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" style="padding: 8px 16px; font-size: 14px; border-radius: 5px; background-color: #f44336; color: white; border: none; cursor: pointer; text-decoration: none; box-shadow: 0 1px 4px rgba(244,67,54,0.10);" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
