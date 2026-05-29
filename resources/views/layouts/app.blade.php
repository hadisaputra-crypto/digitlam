<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Serambi Baco LAM Kota Jambi</title>

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
                            'batik': "url(\"data:image/svg+xml,%3Csvg%20width%3D%27120%27%20height%3D%27120%27%20viewBox%3D%270%200%20120%20120%27%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%3E%3Cg%20fill%3D%27%23fcd34d%27%20fill-opacity%3D%270.07%27%20stroke%3D%27%23fcd34d%27%20stroke-opacity%3D%270.07%27%20stroke-width%3D%271.5%27%20fill-rule%3D%27evenodd%27%20stroke-linecap%3D%27round%27%20stroke-linejoin%3D%27round%27%3E%3Cpath%20d%3D%27M%2025%2045%20C%2025%2045%2035%2038%2060%2038%20C%2085%2038%2095%2045%2095%2045%20C%2095%2045%2085%2055%2060%2055%20C%2035%2055%2025%2045%2025%2045%20Z%27%20fill%3D%27none%27%2F%3E%3Cpath%20d%3D%27M%2020%2040%20C%2020%2040%2023%2028%2032%2025%20C%2045%2035%2075%2035%2088%2025%20C%2097%2028%20100%2040%20100%2040%20C%20100%2040%2092%2048%2060%2048%20C%2028%2048%2020%2040%2020%2040%20Z%27%2F%3E%3Cpath%20d%3D%27M%2032%2025%20C%2030%2022%2028%2015%2028%2015%20C%2028%2015%2033%2018%2035%2022%27%20fill%3D%27none%27%2F%3E%3Cpath%20d%3D%27M%2088%2025%20C%2090%2022%2092%2015%2092%2015%20C%2092%2015%2087%2018%2085%2022%27%20fill%3D%27none%27%2F%3E%3Cpath%20d%3D%27M%2035%2048%20L%2035%2068%20M%2045%2048%20L%2045%2068%20M%2055%2048%20L%2055%2068%20M%2065%2048%20L%2065%2068%20M%2075%2048%20L%2075%2068%20M%2085%2048%20L%2085%2068%27%20fill%3D%27none%27%2F%3E%3Cpath%20d%3D%27M%2030%2052%20L%2090%2052%20M%2030%2068%20L%2090%2068%27%20fill%3D%27none%27%2F%3E%3Cpath%20d%3D%27M%2052%2068%20L%2056%2052%20M%2056%2068%20L%2060%2052%20M%2060%2068%20L%2064%2052%27%20fill%3D%27none%27%2F%3E%3Ccircle%20cx%3D%2760%27%20cy%3D%2743%27%20r%3D%272%27%2F%3E%3Cpath%20d%3D%27M%205%205%20Q%2015%2010%205%2020%20Q%2010%2015%2020%205%20Q%2010%205%205%205%20Z%27%2F%3E%3Ccircle%20cx%3D%2712%27%20cy%3D%2712%27%20r%3D%271.5%27%2F%3E%3Cpath%20d%3D%27M%20115%205%20Q%20105%2010%20115%2020%20Q%20110%2015%20100%205%20Q%20110%205%20115%205%20Z%27%2F%3E%3Ccircle%20cx%3D%27108%27%20cy%3D%2712%27%20r%3D%271.5%27%2F%3E%3Cpath%20d%3D%27M%205%20115%20Q%2015%20110%205%20100%20Q%2010%20105%2020%20115%20Q%2010%20115%205%20115%20Z%27%2F%3E%3Ccircle%20cx%3D%2712%27%20cy%3D%27108%27%20r%3D%271.5%27%2F%3E%3Cpath%20d%3D%27M%20115%20115%20Q%20105%20110%20115%20100%20Q%20110%20105%20100%20115%20Q%20110%20115%20115%20115%20Z%27%2F%3E%3Ccircle%20cx%3D%27108%27%20cy%3D%27108%27%20r%3D%271.5%27%2F%3E%3Cpath%20d%3D%27M%2060%205%20L%20115%2060%20L%2060%20115%20L%205%2060%20Z%27%20fill%3D%27none%27%20stroke-dasharray%3D%272%2C4%27%2F%3E%3Ccircle%20cx%3D%2760%27%20cy%3D%2712%27%20r%3D%272%27%2F%3E%3Ccircle%20cx%3D%2760%27%20cy%3D%27108%27%20r%3D%272%27%2F%3E%3Ccircle%20cx%3D%2712%27%20cy%3D%2760%27%20r%3D%272%27%2F%3E%3Ccircle%20cx%3D%27108%27%20cy%3D%2760%27%20r%3D%272%27%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E\")",
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
