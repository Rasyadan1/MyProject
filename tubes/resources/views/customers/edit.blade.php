@extends('layouts.app')

@section('title', 'Edit Booking Customer')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; min-height: 80vh; background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);">
        <div style="background: #fff; padding: 40px 32px; border-radius: 16px; box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15); width: 100%; max-width: 420px;">
            <h2 style="font-size: 28px; font-weight: 700; margin-bottom: 28px; text-align: center; color: #2d3748; letter-spacing: 1px;">
                Edit Booking
            </h2>
            <form action="{{ route('customers.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="margin-bottom: 22px;">
                    <label for="name" style="display: block; font-weight: 600; margin-bottom: 7px; color: #4a5568;">Nama</label>
                    <input type="text" name="name" value="{{ $user->name }}" required
                        style="width: 100%; padding: 12px; border: 1.5px solid #bfc9d9; border-radius: 8px; font-size: 16px; background: #f7fafc; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='#3182ce'" onblur="this.style.borderColor='#bfc9d9'">
                </div>

                <div style="margin-bottom: 22px;">
                    <label for="email" style="display: block; font-weight: 600; margin-bottom: 7px; color: #4a5568;">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" required
                        style="width: 100%; padding: 12px; border: 1.5px solid #bfc9d9; border-radius: 8px; font-size: 16px; background: #f7fafc; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='#3182ce'" onblur="this.style.borderColor='#bfc9d9'">
                </div>

                <div style="margin-bottom: 28px;">
                    <label for="phone" style="display: block; font-weight: 600; margin-bottom: 7px; color: #4a5568;">Telepon</label>
                    <input type="text" name="phone" value="{{ $user->phone }}"
                        style="width: 100%; padding: 12px; border: 1.5px solid #bfc9d9; border-radius: 8px; font-size: 16px; background: #f7fafc; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='#3182ce'" onblur="this.style.borderColor='#bfc9d9'">
                </div>

                <button type="submit"
                    style="background: linear-gradient(90deg, #4f8cff 0%, #38b2ac 100%); color: #fff; padding: 14px 0; border-radius: 8px; font-size: 18px; font-weight: 600; width: 100%; cursor: pointer; border: none; box-shadow: 0 2px 8px rgba(79, 140, 255, 0.08); transition: background 0.3s;">
                    Update
                </button>
            </form>
        </div>
    </div>
@endsection
