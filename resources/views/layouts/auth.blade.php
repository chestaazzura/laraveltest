<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentication') - Baby Care Shop</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/img/BabyCare.png') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .bg-gradient-auth {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gradient-auth min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full space-y-8 p-8">
        <div class="text-center">
            <img src="{{ asset('storage/img/BabyCare.png') }}" alt="Baby Care Logo" class="mx-auto h-16 w-auto">
            <h2 class="mt-6 text-3xl font-extrabold text-white">
                @yield('auth-title', 'Baby Care Shop')
            </h2>
            <p class="mt-2 text-sm text-blue-100">
                @yield('auth-subtitle', 'Toko Perlengkapan Bayi Terpercaya')
            </p>
        </div>

        <div class="bg-white rounded-lg shadow-xl p-8">
            @yield('content')
        </div>

        <div class="text-center">
            <p class="text-sm text-blue-100">
                © {{ date('Y') }} Baby Care Shop. All rights reserved.
            </p>
        </div>
    </div>

    @include('services.ToastModalUser')

    @stack('scripts')
</body>

</html>
