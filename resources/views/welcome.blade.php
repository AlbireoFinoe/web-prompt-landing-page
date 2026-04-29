<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AI Sales Page Generator</title>
    <!-- Fonts & Tailwind -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-900 text-white font-['Figtree'] selection:bg-blue-500 selection:text-white">

    <!-- Navbar -->
    <nav class="absolute top-0 w-full z-50 px-6 py-6 flex justify-between items-center max-w-7xl mx-auto left-0 right-0">
        <div class="text-2xl font-extrabold tracking-tighter flex items-center gap-2">
            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center shadow-lg shadow-blue-500/30">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            CopyCraft<span class="text-blue-500">AI</span>
        </div>
        
        @if (Route::has('login'))
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-slate-300 hover:text-white transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-medium text-slate-300 hover:text-white transition">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-xl transition shadow-lg shadow-blue-600/30">Mulai Gratis</a>
                    @endif
                @endauth
            </div>
        @endif
    </nav>

    <!-- Hero Section -->
    <main class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <!-- Background Effects -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-600/20 rounded-full mix-blend-screen filter blur-[100px] animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-600/20 rounded-full mix-blend-screen filter blur-[100px] animate-pulse" style="animation-delay: 2s;"></div>
        <div class="absolute inset-0 bg-[url('https://laravel.com/assets/img/welcome/background.svg')] bg-center bg-no-repeat opacity-10"></div>

        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800/50 border border-slate-700 text-sm font-medium text-blue-400 mb-8 backdrop-blur-sm">
                <span class="flex h-2 w-2 rounded-full bg-blue-500 animate-ping absolute"></span>
                <span class="flex h-2 w-2 rounded-full bg-blue-500 relative"></span>
                Powered by LLaMA 3 & Groq AI
            </div>
            
            <h1 class="text-6xl md:text-7xl font-extrabold tracking-tight mb-8 leading-tight">
                Buat Sales Page <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-500">High-Converting</span> dalam Hitungan Detik.
            </h1>
            
            <p class="text-xl text-slate-400 mb-12 max-w-2xl mx-auto leading-relaxed">
                Tinggalkan cara lama menulis copywriting. Cukup masukkan nama produk dan deskripsi singkat, biar AI kami yang meracik struktur kalimat persuasif untuk meningkatkan penjualanmu.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-4 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-2xl transition-all transform hover:-translate-y-1 shadow-xl shadow-blue-600/30 flex items-center justify-center gap-2 text-lg">
                    Buat Sales Page Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
                <a href="https://github.com/AlbireoFinoe/web-prompt-landing-page" target="_blank" class="w-full sm:w-auto px-8 py-4 bg-slate-800 hover:bg-slate-700 border border-slate-700 text-white font-bold rounded-2xl transition-all flex items-center justify-center gap-2 text-lg">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    Lihat Source Code
                </a>
            </div>
        </div>
    </main>

</body>
</html>