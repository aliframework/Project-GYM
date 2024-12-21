@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-2xl font-semibold mb-4">Daftar Membership</h1>

    <div class="mb-3">
        <a href="{{ route('admin.memberships.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tambah Membership</a>
        <a href="{{ route('admin.memberships.withtrashed') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">With Trashed</a>
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
                        <td class="py-2 px-4 border-b">{{ ucfirst($membership->status) }}</td>
                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($membership->start_date)->diffInDays($membership->end_date) }} hari</td>
                        <td class="py-2 px-4 border-b">{{ $membership->category ? $membership->category->nama : 'No Category' }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('admin.memberships.show', $membership->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Show</a>
                            <a href="{{ route('memberships.edit', $membership->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('admin.memberships.destroy', $membership->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Are you sure to delete this membership?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
