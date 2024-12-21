@extends('layouts.user')

@section('content')
<div class="container mt-5">
    <h1 class="text-2xl font-semibold mb-4 text-center">Daftar Membership</h1>

    <!-- Button to Add Membership -->
    <div class="mb-3 d-flex justify-content-end">
        <a href="{{ route('user.memberships.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Tambah Membership
        </a>
    </div>
    
    <!-- Table to display memberships -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b text-left">Nama</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                    <th class="py-2 px-4 border-b text-left">Status</th>
                    <th class="py-2 px-4 border-b text-left">Tanggal Mulai</th>
                    <th class="py-2 px-4 border-b text-left">Tanggal Berakhir</th>
                    <th class="py-2 px-4 border-b text-left">Durasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memberships as $membership)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $membership->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $membership->email }}</td>
                        <td class="py-2 px-4 border-b">{{ ucfirst($membership->status) }}</td>
                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($membership->start_date)->format('d-m-Y') }}</td>
                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($membership->end_date)->format('d-m-Y') }}</td>
                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($membership->start_date)->diffInDays($membership->end_date) }} hari</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
