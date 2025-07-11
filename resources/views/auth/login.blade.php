<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BabyCare Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="h-screen w-screen bg-gray-100 flex items-center justify-center">
    <div class="w-[900px] h-[550px] bg-white shadow-lg rounded-lg flex overflow-hidden">
        <!-- Left Section -->
        <div class="w-1/2 relative">
            <img src="{{ asset('img/auth_banner.png') }}" alt="Family" class="w-full h-full object-cover" />
            <div class="absolute top-4 left-4 text-white text-3xl font-bold drop-shadow-md">BabyCare</div>
        </div>

        <!-- Right Section -->
        <div class="w-1/2 flex flex-col justify-center p-8">
            <div class="w-full max-w-xs mx-auto">

                <div class="mb-4">
                    <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-blue-600 inline-flex items-center">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Beranda
                    </a>
                </div>

                <!-- Title -->
                <div class="flex items-center text-blue-600 text-xl font-semibold mb-6">
                    <i class="fas fa-user-circle mr-2"></i>
                    <span>Welcome</span>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="email" name="email" placeholder="Masukkan Nama Email..." required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    </div>
                    <div class="mb-6">
                        <input type="password" name="password" placeholder="Masukkan Password..." required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-white font-medium py-2 px-6 rounded-md">Login</button>
                        <a href="{{ route('register') }}" class="bg-rose-500 hover:bg-rose-600 text-white font-medium py-2 px-6 rounded-md flex items-center justify-center">Register</a>
                    </div>
                </form>
            </div>
        </div>


    </div>
</body>

</html>
