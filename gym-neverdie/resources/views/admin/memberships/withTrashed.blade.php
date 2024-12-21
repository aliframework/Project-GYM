@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-2xl font-semibold mb-4">Daftar Membership (With Trashed)</h1>

    <div class="mb-3">
        <a href="{{ route('admin.memberships.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kembali ke Daftar Membership</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b text-left">Nama</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                    <th class="py-2 px-4 border-b text-left">Status</th>
                    <th class="py-2 px-4 border-b text-left">Durasi</th>
                    <th class="py-2 px-4 border-b text-left">Kategori</th>
                    <th class="py-2 px-4 border-b text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memberships as $membership)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $membership->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $membership->email }}</td>
                        <td class="py-2 px-4 border-b">
                            @if ($membership->trashed())
                                <span class="bg-yellow-300 text-yellow-800 px-2 py-1 rounded">Deleted</span>
                            @else
                                <span class="bg-green-500 text-white px-2 py-1 rounded">Active</span>
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ \Carbon\Carbon::parse($membership->start_date)->diffInDays($membership->end_date) }} hari
                        </td>
                        <td class="py-2 px-4 border-b">
                            {{ $membership->category ? $membership->category->nama : 'No Category' }}
                        </td>
                        <td class="py-2 px-4 border-b">
                            @if ($membership->trashed())
                                {{-- Restore Button --}}
                                <form action="{{ route('admin.memberships.restore', $membership->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Restore</button>
                                </form>

                                {{-- Force Delete Button --}}
                                <form action="{{ route('admin.memberships.forceDelete', $membership->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Delete this permanently?')">Force Delete</button>
                                </form>
                            @else
                                {{-- Soft Delete Button --}}
                                <form action="{{ route('admin.memberships.softDelete', $membership->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600" onclick="return confirm('Are you sure to soft delete this membership?')">Soft Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
