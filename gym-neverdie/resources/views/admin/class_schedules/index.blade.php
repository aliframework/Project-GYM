@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-2xl font-semibold mb-4">Daftar Jadwal Kelas</h1>

    <div class="mb-3">
        <a href="{{ route('class_schedules.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tambah Jadwal</a>
    </div>
   
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b text-left">Nama Kelas</th>
                    <th class="py-2 px-4 border-b text-left">Instruktur</th>
                    <th class="py-2 px-4 border-b text-left">Tanggal</th>
                    <th class="py-2 px-4 border-b text-left">Jam</th>
                    <th class="py-2 px-4 border-b text-left">Lokasi</th>
                    <th class="py-2 px-4 border-b text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classSchedules as $schedule)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $schedule->class_name }}</td>
                        <td class="py-2 px-4 border-b">{{ $schedule->instructor }}</td>
                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($schedule->date)->format('d-m-Y') }}</td>
                        <td class="py-2 px-4 border-b">{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                        <td class="py-2 px-4 border-b">{{ $schedule->location }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('class_schedules.show', $schedule->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Show</a>
                            <a href="{{ route('class_schedules.edit', $schedule->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('class_schedules.destroy', $schedule->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
