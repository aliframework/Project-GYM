@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-4">
    <h1 class="text-3xl font-semibold mb-6">Detail Kategori</h1>

    <!-- Nama Kategori -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700"><strong>Nama Kategori:</strong></label>
        <p class="mt-1 text-gray-800">{{ $category->nama }}</p>
    </div>

    <!-- Durasi -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700"><strong>Durasi:</strong></label>
        <p class="mt-1 text-gray-800">{{ $category->durasi }} hari</p>
    </div>

    <!-- Deskripsi -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700"><strong>Deskripsi:</strong></label>
        <p class="mt-1 text-gray-800">{{ $category->deskripsi }}</p>
    </div>

    <!-- Harga -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700"><strong>Harga:</strong></label>
        <p class="mt-1 text-gray-800">Rp {{ number_format($category->harga, 2, ',', '.') }}</p>
    </div>

    <!-- Back Button -->
    <div class="mt-6">
        <a href="{{ route('admin.categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Kembali</a>
    </div>
</div>
@endsection
