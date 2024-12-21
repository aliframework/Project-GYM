@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Manage Categories</h1>

    <div class="mb-4">
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add New Category</a>
    </div>

    <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-md">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b text-left">#</th>
                <th class="py-2 px-4 border-b text-left">Name</th>
                <th class="py-2 px-4 border-b text-left">Duration (Days)</th>
                <th class="py-2 px-4 border-b text-left">Description</th>
                <th class="py-2 px-4 border-b text-left">Price</th>
                <th class="py-2 px-4 border-b text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">{{ $category->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $category->nama }}</td>
                    <td class="py-2 px-4 border-b">{{ $category->durasi }} days</td>
                    <td class="py-2 px-4 border-b">{{ $category->deskripsi }}</td>
                    <td class="py-2 px-4 border-b">Rp {{ number_format($category->harga, 2, ',', '.') }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.categories.show', $category) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">View</a>
                        <a href="{{ route('admin.categories.edit', $category) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
