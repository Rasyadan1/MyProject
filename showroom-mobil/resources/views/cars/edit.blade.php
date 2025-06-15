@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Mobil</h2>

    <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        @include('cars.partials.form', ['submit' => 'Update'])

    </form>
</div>
@endsection
