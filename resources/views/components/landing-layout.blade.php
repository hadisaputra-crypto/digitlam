<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Library Digital Lembaga Adat Kota Jambi</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['figtree', 'ui-sans-serif', 'system-ui'],
                        },
                        colors: {
                            'lam-green': '#14532d',
                            'lam-yellow': '#facc15',
                            'lam-purple': '#8b5cf6',
                            'royal-gold': '#fcd34d',
                            'royal-emerald': '#064e3b',
                        },
                        backgroundImage: {
                            'batik': "url(\"data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fcd34d' fill-opacity='0.08' fill-rule='evenodd'%3E%3Cpath d='M40 0l20 40-20 40-20-40zM0 40l40-20 40 20-40 20z'/%3E%3Ccircle cx='40' cy='40' r='4'/%3E%3C/g%3E%3C/svg%3E\")",
                        }
                    }
                }
            }
        </script>
        <!-- Alpine Core -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="min-h-screen bg-gray-50">
            <!-- Top Navigation Bar -->
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>