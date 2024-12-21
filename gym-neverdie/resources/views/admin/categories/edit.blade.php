@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-2xl font-semibold mb-4">Edit Kategori</h1>

    <!-- Kembali ke Daftar Kategori -->
    <div class="mb-3">
        <a href="{{ route('admin.categories.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kembali ke Daftar Kategori</a>
    </div>

    <!-- Form untuk Edit Kategori -->
    <div>
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $category->nama) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                @error('nama')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">{{ old('deskripsi', $category->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" id="harga" name="harga" value="{{ old('harga', $category->harga) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                @error('harga')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="durasi" class="block text-sm font-medium text-gray-700">Durasi (Hari)</label>
                <input type="number" id="durasi" name="durasi" value="{{ old('durasi', $category->durasi) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                @error('durasi')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Perbarui Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection
