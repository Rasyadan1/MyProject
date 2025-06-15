@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Mobil</h2>

    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('cars.partials.form', ['submit' => 'Simpan'])

    </form>
</div>
@endsection
