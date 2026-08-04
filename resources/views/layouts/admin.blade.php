<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - CodeFlow')</title>
    <link rel="shortcut icon" href="{{ asset('storage/codeflowlogo.png') }}" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Outfit', sans-serif;
            background-color: #0A0F1D;
        }
    </style>
</head>
<body class="text-slate-100 antialiased selection:bg-cyan-500 selection:text-slate-900 overflow-x-hidden min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#060a13] border-r border-slate-800/80 flex flex-col justify-between shrink-0">
        <div>
            <!-- Sidebar Header -->
            <div class="p-6 border-b border-slate-800/80">
                <a href="{{ url('/') }}" class="flex items-center gap-2.5 font-bold text-xl text-white">
                    <span class="bg-gradient-to-r from-cyan-400 to-purple-600 bg-clip-text text-transparent">CodeFlow Admin</span>
                </a>
            </div>
            
            <!-- Sidebar Links -->
            <nav class="p-4 space-y-1.5">
                <a href="{{ route('admin.projects.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.projects.index') ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/40 border border-transparent' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                    Manage Projects
                </a>
                <a href="{{ route('admin.projects.create') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.projects.create') ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20' : 'text-slate-400 hover:text-white hover:bg-slate-800/40 border border-transparent' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Add Project
                </a>
                <a href="{{ url('/') }}" target="_blank" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-slate-400 hover:text-white hover:bg-slate-800/40 border border-transparent transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    View Website
                </a>
            </nav>
        </div>
        
        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-slate-800/80">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-rose-400 hover:bg-rose-500/10 hover:text-rose-300 border border-transparent transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Log Out
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Admin Workspace -->
    <div class="flex-grow flex flex-col min-h-screen">
        <!-- Top Navbar -->
        <header class="h-20 border-b border-slate-800/80 bg-[#060a13]/40 backdrop-blur flex items-center justify-between px-8">
            <h1 class="font-semibold text-lg text-white">@yield('page_title', 'Dashboard')</h1>
            
            <div class="flex items-center gap-4">
                <span class="text-xs font-semibold px-3 py-1.5 rounded-full bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">Administrator</span>
                <span class="text-sm text-slate-300">{{ env('ADMIN_EMAIL') }}</span>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-grow p-8 bg-[#090e1a]/95">
            @yield('content')
        </main>
    </div>

    <!-- Alert / Notifications Handler -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                background: '#0B132B',
                color: '#fff',
                confirmButtonColor: '#06B6D4',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true
            });
        </script>
    @endif
</body>
</html>
