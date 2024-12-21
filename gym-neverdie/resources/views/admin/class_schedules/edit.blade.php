@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-2xl font-semibold mb-4">Edit Jadwal Kelas</h1>

    <form action="{{ route('class_schedules.update', $classSchedule) }}" method="POST" class="bg-white p-6 rounded-md shadow-md border border-gray-300">
        @csrf
        @method('PUT')

        <!-- Class Name -->
        <div class="mb-4">
            <label for="class_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Kelas</label>
            <input 
                type="text" 
                name="class_name" 
                id="class_name" 
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('class_name') border-red-500 @enderror" 
                value="{{ old('class_name', $classSchedule->class_name) }}" 
                required>
            @error('class_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Instructor -->
        <div class="mb-4">
            <label for="instructor" class="block text-sm font-medium text-gray-700 mb-2">Instruktur</label>
            <input 
                type="text" 
                name="instructor" 
                id="instructor" 
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('instructor') border-red-500 @enderror" 
                value="{{ old('instructor', $classSchedule->instructor) }}" 
                required>
            @error('instructor')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Date -->
        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
            <input 
                type="date" 
                name="date" 
                id="date" 
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('date') border-red-500 @enderror" 
                value="{{ old('date', $classSchedule->date) }}" 
                required>
            @error('date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Start Time -->
        <div class="mb-4">
            <label for="start_time" class="block text-sm font-medium text-gray-700 mb-2">Jam Mulai</label>
            <input 
                type="time" 
                name="start_time" 
                id="start_time" 
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('start_time') border-red-500 @enderror" 
                value="{{ old('start_time', $classSchedule->start_time) }}" 
                required>
            @error('start_time')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- End Time -->
        <div class="mb-4">
            <label for="end_time" class="block text-sm font-medium text-gray-700 mb-2">Jam Selesai</label>
            <input 
                type="time" 
                name="end_time" 
                id="end_time" 
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('end_time') border-red-500 @enderror" 
                value="{{ old('end_time', $classSchedule->end_time) }}" 
                required>
            @error('end_time')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Location -->
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
            <input 
                type="text" 
                name="location" 
                id="location" 
                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('location') border-red-500 @enderror" 
                value="{{ old('location', $classSchedule->location) }}">
            @error('location')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit and Cancel Buttons -->
        <div class="flex justify-end space-x-2">
            <a href="{{ route('class_schedules.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Batal</a>
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
