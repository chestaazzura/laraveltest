<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BabyCare Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="h-screen w-screen bg-gray-100 flex items-center justify-center">
    <div class="w-[900px] h-[600px] bg-white shadow-lg rounded-lg flex overflow-hidden">
        <!-- Left Section -->
        <div class="w-1/2 relative">
            <img src="{{ asset('img/auth_banner.png') }}" alt="Family" class="w-full h-full object-cover" />
            <div class="absolute top-4 left-4 text-white text-3xl font-bold drop-shadow-md">BabyCare</div>
        </div>

        <!-- Right Section -->
        <div class="w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-xs">
                <div class="mb-4">
                    <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-blue-600 inline-flex items-center">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Beranda
                    </a>
                </div>
                <div class="flex items-center text-blue-600 text-xl font-semibold mb-6">
                    <i class="fas fa-user-plus mr-2"></i>
                    <span>Register</span>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="name" placeholder="Full Name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required />
                    </div>
                    <div class="mb-4">
                        <input type="email" name="email" placeholder="Email Address" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required />
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required />
                    </div>
                    <div class="mb-6">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required />
                    </div>

                    <input type="hidden" name="role_id" value="2"> <!-- default role_id 'user' = 2 -->

                    <div class="flex justify-between">
                        <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-blue-600 mt-2">sudah punya akun? Login</a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-6 rounded-md">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
