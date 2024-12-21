@extends('layouts.user')

@section('content')
<div class="container mx-auto px-6 py-4">
    <h1 class="text-3xl font-semibold mb-6">Tambah Membership</h1>

    <form action="{{ route('memberships.store') }}" method="POST" novalidate>
        @csrf
        @if($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Nama -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tanggal Mulai -->
        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('start_date') }}" required>
            @error('start_date')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Dropdown Kategori -->
        <div class="mb-4">
            <label for="id_category" class="block text-sm font-medium text-gray-700">Kategori</label>
            <select name="id_category" id="id_category" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        data-durasi="{{ $category->durasi }}" 
                        {{ old('id_category') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama }}
                    </option>
                @endforeach
            </select>
            @error('id_category')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Dropdown Status -->
        <div class="mb-4">
            <input type="hidden" name="status" value="active">
        </div>


        <!-- Tanggal Berakhir (Auto-calculated) -->
        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Berakhir</label>
            <input type="date" name="end_date" id="end_date" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('end_date') }}" readonly required>
            @error('end_date')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end gap-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
            <a href="{{ route('memberships.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Batal</a>
        </div>
    </form>
</div>

<script>
    function setEndDate() {
        const selectedOption = document.querySelector('#id_category option:checked');
        const durasi = selectedOption ? selectedOption.getAttribute('data-durasi') : null;
        const startDate = document.getElementById('start_date').value;

        if (startDate && durasi) {
            const startDateObj = new Date(startDate);
            startDateObj.setDate(startDateObj.getDate() + parseInt(durasi)); 
            const endDate = startDateObj.toISOString().split('T')[0]; 
            document.getElementById('end_date').value = endDate;
        }
    }

    document.getElementById('id_category').addEventListener('change', setEndDate);

    document.getElementById('start_date').addEventListener('change', setEndDate);
    if (document.getElementById('start_date').value && document.getElementById('id_category').value) {
        setEndDate();
    }
</script>

@endsection
