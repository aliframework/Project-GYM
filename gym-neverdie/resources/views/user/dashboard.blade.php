@extends('layouts.user')

@section('content')
<div class="dashboard container mt-4">
    <div class="row mb-4">

        <!-- Banner Section -->
        <div class="relative bg-cover bg-center h-96" style="background-image: url('{{ asset('images/img1.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <h2 class="text-5xl font-bold text-white text-shadow-md">Welcome to Heroes Gym</h2>
            </div>
        </div>

        <!-- Greeting Message -->
        <div class="col-12 text-start mt-4">
            <p class="text-2xl font-semibold text-gray-800">Selamat datang di Gym Heroes, <span class="font-bold text-blue-500">{{ Auth::user()->name }}</span>! Kelola keanggotaan Anda dengan mudah.</p>
        </div>
    </div>

</div>
@endsection