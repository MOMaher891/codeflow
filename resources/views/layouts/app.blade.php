<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('CodeFlow - Premium Software House & Development Portfolio'))</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Outfit', sans-serif;
            background-color: #0A0F1D;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0A0F1D;
        }
        ::-webkit-scrollbar-thumb {
            background: #1E293B;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }
    </style>
</head>
<body class="text-slate-100 antialiased selection:bg-cyan-500 selection:text-slate-900 overflow-x-hidden min-h-screen flex flex-col">
    <!-- Ambient Neon Background Glows -->
    <div class="fixed top-0 left-1/4 -translate-y-1/2 -translate-x-1/2 w-[500px] h-[500px] rounded-full bg-cyan-500/10 blur-[120px] pointer-events-none z-0"></div>
    <div class="fixed bottom-0 right-1/4 translate-y-1/2 translate-x-1/2 w-[600px] h-[600px] rounded-full bg-purple-600/10 blur-[130px] pointer-events-none z-0"></div>

    <!-- Header Navigation -->
    <header class="sticky top-0 z-50 backdrop-blur-md border-b border-slate-800/50 bg-[#0A0F1D]/70 transition-all duration-300" 
            x-data="{ isOpen: false, scrolled: false }"
            x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
            :class="scrolled ? 'py-4 shadow-2xl border-slate-800/80 bg-[#060a15]/90' : 'py-6'">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
            <a href="{{ url('/') }}" class="group flex items-center gap-2.5 font-bold text-2xl tracking-tight text-white">
                <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent group-hover:from-purple-500 group-hover:to-cyan-400 transition-all duration-500">{{ __('CodeFlow') }}</span>
            </a>
            
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-300">
                <a href="#hero" class="hover:text-white transition-colors">{{ __('Home') }}</a>
                <a href="#services" class="hover:text-white transition-colors">{{ __('Services') }}</a>
                <a href="#projects" class="hover:text-white transition-colors">{{ __('Projects') }}</a>
                <a href="#contact" class="hover:text-white transition-colors">{{ __('Contact') }}</a>
            </nav>

            <div class="hidden md:flex items-center gap-4">
                <!-- Language Switcher -->
                @if(app()->getLocale() == 'ar')
                    <a href="{{ route('lang.switch', 'en') }}" class="text-xs font-semibold text-slate-400 hover:text-white transition-all px-3.5 py-2 rounded-full border border-slate-800 bg-[#0A0F1D]/80">English</a>
                @else
                    <a href="{{ route('lang.switch', 'ar') }}" class="text-xs font-semibold text-slate-400 hover:text-white transition-all px-3.5 py-2 rounded-full border border-slate-800 bg-[#0A0F1D]/80">العربية</a>
                @endif

                <a href="#contact" class="relative group px-6 py-2.5 rounded-full text-sm font-medium text-white transition-all duration-300 overflow-hidden">
                    <span class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-purple-600 group-hover:from-purple-600 group-hover:to-cyan-500 transition-all duration-500"></span>
                    <span class="absolute inset-[1px] bg-[#0A0F1D] rounded-full group-hover:opacity-0 transition-opacity duration-300"></span>
                    <span class="relative z-10">{{ __('Start Project') }}</span>
                </a>
            </div>

            <!-- Mobile Hamburger -->
            <button @click="isOpen = !isOpen" class="md:hidden text-slate-300 hover:text-white focus:outline-none">
                <svg x-show="!isOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                <svg x-show="isOpen" style="display: none;" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden absolute top-full left-0 w-full bg-[#0A0F1D]/95 border-b border-slate-800 px-6 py-6 flex flex-col gap-4 shadow-xl"
             style="display: none;">
            <a href="#hero" @click="isOpen = false" class="text-slate-300 hover:text-white font-medium py-2">{{ __('Home') }}</a>
            <a href="#services" @click="isOpen = false" class="text-slate-300 hover:text-white font-medium py-2">{{ __('Services') }}</a>
            <a href="#projects" @click="isOpen = false" class="text-slate-300 hover:text-white font-medium py-2">{{ __('Projects') }}</a>
            <a href="#contact" @click="isOpen = false" class="text-slate-300 hover:text-white font-medium py-2">{{ __('Contact') }}</a>
            <hr class="border-slate-800 my-2">
            
            <!-- Mobile Language Switcher -->
            @if(app()->getLocale() == 'ar')
                <a href="{{ route('lang.switch', 'en') }}" @click="isOpen = false" class="text-slate-300 hover:text-white font-medium py-2">English (EN)</a>
            @else
                <a href="{{ route('lang.switch', 'ar') }}" @click="isOpen = false" class="text-slate-300 hover:text-white font-medium py-2">العربية (AR)</a>
            @endif
            <hr class="border-slate-800 my-2">

            <a href="#contact" @click="isOpen = false" class="w-full text-center px-6 py-3 rounded-full text-sm font-medium bg-gradient-to-r from-cyan-500 to-purple-600 text-white">{{ __('Start Project') }}</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow z-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-900 bg-[#050811] py-12 z-10">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <a href="#" class="font-bold text-xl bg-gradient-to-r from-cyan-400 to-purple-600 bg-clip-text text-transparent">{{ __('CodeFlow') }}</a>
                <p class="text-slate-500 text-sm mt-2">{{ __('© :year CodeFlow. All rights reserved. Crafting stellar digital experiences.', ['year' => date('Y')]) }}</p>
            </div>
            <div class="flex items-center gap-6 text-sm text-slate-400">
                <a href="#services" class="hover:text-white transition-colors">{{ __('Services') }}</a>
                <a href="#projects" class="hover:text-white transition-colors">{{ __('Projects') }}</a>
                <a href="{{ route('admin.login') }}" class="hover:text-white transition-colors flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    {{ __('Admin Area') }}
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
