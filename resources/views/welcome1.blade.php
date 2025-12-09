<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip HIMAKOM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
        }
            @keyframes rotate {
        100% {
            transform: rotate(1turn);
        }
    }

    .rainbow::before {
        content: '';
        position: absolute;
        z-index: -2;
        left: -50%;
        top: -50%;
        width: 200%;
        height: 200%;
        background-position: 100% 50%;
        background-repeat: no-repeat;
        background-size: 50% 30%;
        filter: blur(6px);
        background-image: linear-gradient(#FFCC00);
        animation: rotate 4s linear infinite;
    }
    </style>
</head>
<body class="bg-black text-gray-100 h-screen overflow-hidden">
    <!-- Header -->
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8 max-w-[1440px] mx-auto">
            <div class="shrink-0 flex items-center">
                <div  class="flex items-center">
                    <div class="bg-[#FFCC00]/10 text-[#ffcc00] rounded-md p-1 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 16v-5.5A3.5 3.5 0 0 0 7.5 7m3.5 9H4v-5.5A3.5 3.5 0 0 1 7.5 7m3.5 9v4M7.5 7H14m0 0V4h2.5M14 7v3m-3.5 6H20v-6a3 3 0 0 0-3-3m-2 9v4m-8-6.5h1"/></svg>
                    </div>
                    <span class="text-xl font-bold text-white">SIPANDA</span>
                </div>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="#" class="text-sm font-semibold leading-6 text-white">Masuk <span aria-hidden="true">→</span></a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <div class="relative isolate px-6 pt-14 lg:px-8">
        <!-- Background Gradient -->
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ffcc00] to-[#ffa600] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>

        <div class="mx-auto max-w-3xl py-32 sm:py-48 lg:py-56 ">
            <!-- Main Content -->
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                    Arsip modern, <br>
                    Organisir surat tanpa ribet.
                </h1>
                <p class="mt-6 text-lg leading-8 text-white/80 max-w-2xl mx-auto">
                    Sistem arsip digital yang memudahkan Anda mencari dan mengelola surat organisasi penting dengan cepat dan efisien.
                </p>

                <!-- CTA Buttons -->

                 <div class="flex flex-col sm:flex-row sm:justify-center gap-4 mt-6 items-center">
                    <div class="rainbow relative z-0 bg-white/15 overflow-hidden p-[1px] flex items-center justify-center rounded-full hover:scale-105 transition duration-300 active:scale-100 w-fit">
                        <button class="px-8 text-md py-3 text-white rounded-full font-medium bg-black/80 backdrop-blur">
                            Akses langsung
                            <a href="{{ route('login') }}" class="font-semibold text-yellow-400">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                Masuk
                                <span aria-hidden="true"> →</span>
                            </a>
                        </button>
                    </div>
                     <!-- Sign Up Link -->
                     <div class="">
                         <span class="text-gray-400 text-sm">
                             Belum punya akun?
                             <a href="#" class="text-gray-300 underline underline-offset-4 hover:text-white transition">
                                 Daftar
                             </a>
                         </span>
                     </div>
                 </div>

            </div>
        </div>

        <!-- Bottom Gradient -->
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ffcc00] to-[#ffa600] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>
</body>
</html>
