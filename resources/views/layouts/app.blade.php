<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Baby Care Shop') - Toko Perlengkapan Bayi</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .bg-gradient-baby {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .footer-curve {
            position: relative;
            background: white;
            padding-top: 6rem;
        }

        .footer-curve::before {
            content: '';
            position: absolute;
            top: -60px;
            left: 0;
            width: 100%;
            height: 80px;
            background: white;
            border-top-left-radius: 100% 80px;
            border-top-right-radius: 100% 80px;
        }

        body {
            background: linear-gradient(to bottom, #00B4D8, #A2D2FF);
        }

        .product-card {
            background-color: #0077B6;
            color: white;
        }

        .product-card h4 {
            color: white;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">
    @include('user.partials.navbar')

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    @include('user.partials.footer')
    @include('services.ToastModalUser')


    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
