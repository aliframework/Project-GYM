@extends('layouts.user')

@section('content')
    <h1 class="text-3xl font-semibold mb-8 text-center text-gray-800">Class Schedules</h1>

    <!-- Grid Container -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($classSchedules as $schedule)
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 ease-in-out transform hover:scale-105">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $schedule->class_name }}</h2>
                <div class="text-gray-600 mb-2">
                    <p><strong>Instructor:</strong> {{ $schedule->instructor }}</p>
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($schedule->date)->format('d-m-Y') }}</p>
                    <p><strong>Time:</strong> {{ $schedule->start_time }} - {{ $schedule->end_time }}</p>
                    <p><strong>Location:</strong> {{ $schedule->location ?? 'Not specified' }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
