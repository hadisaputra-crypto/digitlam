<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Library Digital Lembaga Adat Kota Jambi</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Tailwind CDN fallback (quick fix when assets not built) -->
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
        <!-- Scripts & Vite assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Minimal inline CSS fallback to ensure basic card and nav spacing
             (applies even when custom CSS isn't built). -->
        <style>
            .app-container { max-width: 1200px; margin: 0 auto; padding: 0 1rem; }
            .logo-link { display:flex; align-items:center; gap:.5rem; }
            /* readable link colors */
            a { color: #0f172a; }
            .primary-cta { background: linear-gradient(90deg,#06b6d4,#3b82f6); color:white; }
            /* ensure nav stacks correctly on small screens */
            nav ul { list-style:none; margin:0; padding:0; display:flex; gap:1rem; align-items:center; }
            @media (max-width:640px) { nav ul { flex-direction:column; align-items:flex-start; } }
            
            /* Custom Scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
            }
            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }
            ::-webkit-scrollbar-thumb {
                background: #14532d;
                border-radius: 4px;
            }
            ::-webkit-scrollbar-thumb:hover {
                background: #064e3b;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50">
            @include('layouts.navigation')

            <!-- Page Heading (simplified) -->
            @if (isset($header))
                <header class="bg-white shadow-sm border-b border-gray-100">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-md shadow-sm">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700 font-medium">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                    <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-md shadow-sm">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-green-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700 font-medium">
                                    {{ session('error') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
