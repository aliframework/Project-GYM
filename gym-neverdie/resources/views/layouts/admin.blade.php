<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Import Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white p-4">
            <h2 class="text-2xl font-semibold mb-6">Admin Panel</h2>
            <ul>
                <li class="mb-4">
                    <a href="{{ route('admin.dashboard') }}" class="hover:bg-gray-700 p-2 rounded-md block">Dashboard</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('admin.categories.index') }}" class="hover:bg-gray-700 p-2 rounded-md block">Manage Categories</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('admin.memberships.index') }}" class="hover:bg-gray-700 p-2 rounded-md block">Manage Memberships</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('admin.class_schedules.index') }}" class="hover:bg-gray-700 p-2 rounded-md block">Manage Schedules</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('admin.memberships.create') }}" class="hover:bg-gray-700 p-2 rounded-md block">Create Membership</a>
                </li>
                <li class="mb-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="hover:bg-gray-700 p-2 rounded-md block">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Card with shadow -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <!-- Content section (this will be filled by the specific page content) -->
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
