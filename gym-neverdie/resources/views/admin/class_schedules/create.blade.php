@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-2xl font-semibold mb-4">Tambah Jadwal Kelas</h1>

    <form action="{{ route('class_schedules.store') }}" method="POST" class="bg-white p-6 rounded-md shadow-md border border-gray-300">
        @csrf
        <div class="mb-4">
            <label for="class_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Kelas</label>
            <input type="text" name="class_name" id="class_name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="instructor" class="block text-sm font-medium text-gray-700 mb-2">Instruktur</label>
            <input type="text" name="instructor" id="instructor" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
            <input type="date" name="date" id="date" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="start_time" class="block text-sm font-medium text-gray-700 mb-2">Jam Mulai</label>
            <input type="time" name="start_time" id="start_time" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="end_time" class="block text-sm font-medium text-gray-700 mb-2">Jam Selesai</label>
            <input type="time" name="end_time" id="end_time" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
            <input type="text" name="location" id="location" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600">Simpan</button>
        </div>
    </form>
</div>
@endsection
