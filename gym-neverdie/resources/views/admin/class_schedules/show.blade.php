@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-2xl font-semibold mb-4">Detail Jadwal Kelas</h1>

    <div class="bg-white p-6 rounded-md shadow-md border border-gray-300">
        <!-- Class Name -->
        <div class="mb-4">
            <h2 class="text-xl font-semibold text-gray-800">{{ $classSchedule->class_name }}</h2>
        </div>

        <!-- Details -->
        <div class="space-y-2 text-gray-700">
            <p><strong>Instruktur:</strong> {{ $classSchedule->instructor }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($classSchedule->date)->format('d-m-Y') }}</p>
            <p><strong>Jam Mulai:</strong> {{ \Carbon\Carbon::parse($classSchedule->start_time)->format('H:i') }}</p>
            <p><strong>Jam Selesai:</strong> {{ \Carbon\Carbon::parse($classSchedule->end_time)->format('H:i') }}</p>
            <p><strong>Lokasi:</strong> {{ $classSchedule->location ?? 'Belum ditentukan' }}</p>
        </div>

        <!-- Actions -->
        <div class="mt-6 flex space-x-3">
            <a href="{{ route('admin.class_schedules.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Kembali</a>
            <a href="{{ route('admin.class_schedules.edit', $classSchedule) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Edit Jadwal</a>
        </div>
    </div>
</div>
@endsection
