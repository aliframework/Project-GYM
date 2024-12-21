@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-4">
    <h1 class="text-3xl font-semibold mb-6">Tambah Kategori</h1>
    
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <!-- Nama Kategori -->
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
            <input type="text" name="nama" id="nama" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('nama') }}" required>
            @error('nama')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Durasi -->
        <div class="mb-4">
            <label for="durasi" class="block text-sm font-medium text-gray-700">Durasi (Hari)</label>
            <input type="number" name="durasi" id="durasi" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('durasi') }}" required>
            @error('durasi')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="mt-1 p-2 w-full border border-gray-300 rounded-md">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Harga -->
        <div class="mb-4">
            <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" name="harga" id="harga" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('harga') }}" step="0.01" required>
            @error('harga')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end gap-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Batal</a>
        </div>
    </form>
</div>
@endsection
