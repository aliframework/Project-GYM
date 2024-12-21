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
                    <ul class="flex space-x-6">
                        <li><a href="#" class="hover:underline">Home</a></li>
                        <li><a href="#" class="hover:underline">Membership</a></li>
                        <li><a href="#" class="hover:underline">Schedule</a></li>
                        <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                        <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Banner -->
        <div class="relative bg-cover bg-center h-64" style="background-image: url('images/img1.jpg');">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <h2 class="text-4xl font-bold text-white">Welcome to Heroes Gym</h2>
            </div>
        </div>

        <!-- Main Content -->
        <main class="flex-1 container mx-auto px-6 mt-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Membership Section -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <img src="images/img2.jpg" alt="Membership" class="w-[400px] h-[200px] object-cover rounded mb-4">
                    <h2 class="text-xl font-bold mb-4">Membership</h2>
                    <p class="text-gray-600 mb-4">Join our gym and access premium facilities and classes!</p>
                    <!-- Tombol untuk Bergabung -->
                    <a href="{{ route('user.memberships.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Join Now</a>
                </div>

                <!-- Class Schedule Section -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <img src="images/img3.jpg" alt="Membership" class="w-[400px] h-[200px] object-cover rounded mb-4">
                    <h2 class="text-xl font-bold mb-4">Class Schedule</h2>
                    <p class="text-gray-600 mb-4">Check out our weekly class schedule and book your spot.</p>
                    <!-- Tombol untuk Melihat Jadwal -->
                    <a href="{{ route('user.class_schedules.index') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">View Schedule</a>
                </div>

                <!-- Contact Section -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    <img src="images/img4.jpg" alt="Membership" class="w-[400px] h-[200px] object-cover rounded mb-4">
                    <h2 class="text-xl font-bold mb-4">Contact Us</h2>
                    <p class="text-gray-600 mb-4">Need help or have questions? Reach out to us anytime.</p>
                    <a href="#" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Contact</a>
                </div>
            </div>
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
