@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Daftar Membership</h1>
    <a href="{{ route('memberships.create') }}" class="btn btn-primary mb-3">Tambah Membership</a>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memberships as $membership)
                    <tr>
                        <td>{{ $membership->name }}</td>
                        <td>{{ $membership->email }}</td>
                        <td>{{ ucfirst($membership->status) }}</td>
                        <td>{{ \Carbon\Carbon::parse($membership->start_date)->diffInDays($membership->end_date) }} hari</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('memberships.show', $membership) }}" class="btn btn-warning btn-sm">Show</a>
                            <a href="{{ route('memberships.edit', $membership) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('memberships.destroy', $membership) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
