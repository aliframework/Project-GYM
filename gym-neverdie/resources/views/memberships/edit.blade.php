@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Membership</h1>
    <form action="{{ route('memberships.update', $membership) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $membership->name) }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $membership->email) }}" required>
        </div>
        <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', $membership->start_date) }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">Tanggal Berakhir</label>
            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date', $membership->end_date) }}" required>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Perbarui</button>
    </form>
</div>
@endsection
