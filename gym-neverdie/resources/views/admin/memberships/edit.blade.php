@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-4">
    <h1 class="text-3xl font-semibold mb-6">Edit Membership</h1>

    <a href="{{ route('memberships.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Kembali ke Daftar Membership</a>

    <form action="{{ route('memberships.update', $membership->id) }}" method="POST" class="mt-6">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('name', $membership->name) }}" required>
            @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('email', $membership->email) }}" required>
            @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tanggal Mulai -->
        <div class="mb-4">
            <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
            <input type="date" name="start_date" id="start_date" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('start_date', $membership->start_date) }}" required>
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
                    <option value="{{ $category->id }}" data-durasi="{{ $category->durasi }}"
                        {{ $membership->id_category == $category->id ? 'selected' : '' }}>
                        {{ $category->nama }}
                    </option>
                @endforeach
            </select>
            @error('id_category')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tanggal Berakhir -->
        <div class="mb-4">
            <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Berakhir</label>
            <input type="date" name="end_date" id="end_date" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('end_date', $membership->end_date) }}" readonly required>
            @error('end_date')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status Dropdown (Editable) -->
        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                <option value="active" {{ old('status', $membership->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $membership->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="expired" {{ old('status', $membership->status) == 'expired' ? 'selected' : '' }}>Expired</option>
            </select>
            @error('status')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end gap-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Perbarui Membership</button>
            <a href="{{ route('memberships.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Batal</a>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const categorySelect = document.getElementById('id_category');

        function calculateEndDate() {
            const startDateValue = startDateInput.value;
            const selectedOption = categorySelect.options[categorySelect.selectedIndex];
            const durasi = selectedOption ? selectedOption.getAttribute('data-durasi') : null;

            if (startDateValue && durasi) {
                const startDate = new Date(startDateValue);
                startDate.setDate(startDate.getDate() + parseInt(durasi));
                const endDate = startDate.toISOString().split('T')[0];
                endDateInput.value = endDate;
            } else {
                endDateInput.value = '';
            }
        }

        categorySelect.addEventListener('change', calculateEndDate);
        startDateInput.addEventListener('change', calculateEndDate);

        // Call on page load to set initial value
        calculateEndDate();
    });
</script>
@endsection
