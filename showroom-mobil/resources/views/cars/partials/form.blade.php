<div class="mb-3">
    <label for="name" class="form-label">Nama Mobil</label>
    <input type="text" name="name" value="{{ old('name', $car->name ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="brand" class="form-label">Merk</label>
    <input type="text" name="brand" value="{{ old('brand', $car->brand ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="year" class="form-label">Tahun</label>
    <input type="number" name="year" value="{{ old('year', $car->year ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="price" class="form-label">Harga</label>
    <input type="number" name="price" value="{{ old('price', $car->price ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control">{{ old('description', $car->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="image" class="form-label">Foto Mobil</label>
    <input type="file" name="image" class="form-control">
    @if(isset($car) && $car->image)
        <img src="{{ asset('storage/' . $car->image) }}" alt="Preview" width="150" class="mt-2">
    @endif
</div>

<button class="btn btn-primary">{{ $submit }}</button>
<a href="{{ route('cars.index') }}" class="btn btn-secondary">Batal</a>

<!-- Custom CSS untuk styling dengan tema rental mobil premium -->
<style>
    /* Form container (diasumsikan dalam container Bootstrap dari layouts.app) */
    .mb-3 {
        animation: fadeInUp 0.5s ease-in;
    }

    /* Labels */
    .form-label {
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
    }

    /* Inputs */
    .form-control {
        border-color: #003087 !important; /* Biru navy */
        border-radius: 8px;
        background-color: #fff !important;
        color: #333 !important;
        font-size: 1rem;
        padding: 0.75rem 1rem;
        transition: border-color 0.3s, box-shadow 0.3s, transform 0.2s;
    }

    .form-control:focus {
        border-color: #FFD700 !important; /* Emas saat fokus */
        box-shadow: 0 0 8px rgba(255, 215, 0, 0.3);
        outline: none;
        transform: translateY(-2px);
    }

    /* Textarea */
    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }

    /* File input */
    .form-control[type="file"] {
        padding: 0.5rem;
        cursor: pointer;
        color: #333;
    }

    /* Preview image */
    .mt-2 {
        border-radius: 8px;
        border: 2px solid #003087; /* Biru navy */
        padding: 4px;
        max-width: 150px;
        background-color: rgba(255, 255, 255, 0.2);
        transition: transform 0.3s;
    }

    .mt-2:hover {
        transform: scale(1.05);
    }

    /* Tombol */
    .btn-primary {
        background-color: #003087 !important; /* Biru navy */
        border: none;
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-primary:hover {
        background-color: #00205b !important; /* Biru navy lebih gelap */
        transform: translateY(-2px);
    }

    .btn-secondary {
        background-color: #6c757d !important; /* Abu-abu */
        border: none;
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-secondary:hover {
        background-color: #5a6268 !important;
        transform: translateY(-2px);
    }

    /* Animasi untuk form */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsif */
    @media (max-width: 768px) {
        .form-control {
            font-size: 0.9rem;
            padding: 0.6rem 0.8rem;
        }

        .btn {
            font-size: 0.85rem;
            padding: 0.6rem 1rem;
        }

        .mt-2 {
            max-width: 120px;
        }
    }
</style>