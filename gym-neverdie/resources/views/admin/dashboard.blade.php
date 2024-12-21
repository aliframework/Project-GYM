@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <h1>Dashboard Admin</h1>
    <p>Selamat datang, {{ Auth::check() ? Auth::user()->name : 'Guest' }}!</p>
</div>
@endsection
