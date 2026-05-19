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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <!-- Marquee Header -->
        <div class="bg-batik text-white py-4 shadow-md overflow-hidden border-b-2 border-yellow-400 relative z-50">
            <marquee behavior="scroll" direction="left" scrollamount="8" class="font-extrabold text-2xl tracking-widest uppercase text-royal">
                Selamat datang di Library Digital Lembaga Adat Kota Jambi
            </marquee>
        </div>

        <main class="min-h-screen flex items-center justify-center -mt-16 py-12 px-4">
            <div class="w-full sm:max-w-md card-surface p-6 relative z-10">
                {{ $slot }}
            </div>
        </main>
    </body>
</html>
