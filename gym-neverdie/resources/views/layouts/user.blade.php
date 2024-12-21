<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heroes Gym</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-6 shadow-lg">
            <div class="container mx-auto flex items-center justify-between px-6">
                <h1 class="text-3xl font-bold">Heroes Gym</h1>
                <nav>
                    <ul class="flex space-x-8 text-lg">
                        <li><a href="{{ route('user.dashboard') }}" class="hover:text-yellow-300 transition-all">Dashboard</a></li>
                        <li><a href="{{ route('user.memberships.index') }}" class="hover:text-yellow-300 transition-all">Membership</a></li>
                        <li><a href="{{ route('user.class_schedules.index') }}" class="hover:text-yellow-300 transition-all">Schedule</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="hover:text-yellow-300 transition-all">Logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 container mx-auto px-6 mt-8">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4 mt-6">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 Heroes Gym. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>

</html>
