<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - CodeFlow</title>
    <link rel="shortcut icon" href="{{ asset('storage/codeflowlogo.png') }}" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Outfit', sans-serif;
            background-color: #0A0F1D;
        }
    </style>
</head>
<body class="text-slate-100 antialiased selection:bg-cyan-500 selection:text-slate-900 overflow-x-hidden min-h-screen flex items-center justify-center relative">
    <!-- Background Glows -->
    <div class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 w-[500px] h-[500px] rounded-full bg-cyan-500/10 blur-[120px] pointer-events-none z-0"></div>
    <div class="absolute top-1/3 left-1/3 w-[300px] h-[300px] rounded-full bg-purple-600/10 blur-[130px] pointer-events-none z-0"></div>

    <div class="w-full max-w-md p-6 relative z-10">
        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="{{ url('/') }}" class="font-bold text-3xl tracking-tight bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent">
                CodeFlow
            </a>
            <p class="text-slate-400 text-sm mt-2">Administrator Panel Portal</p>
        </div>

        <!-- Login Card -->
        <div class="bg-[#0b132b]/50 backdrop-blur-xl border border-slate-800/80 rounded-3xl p-8 shadow-2xl">
            <h2 class="text-xl font-semibold text-white mb-6 text-center">Sign In to Dashboard</h2>

            @if($errors->any())
                <div class="mb-5 p-4 rounded-2xl bg-rose-500/10 border border-rose-500/20 text-rose-300 text-sm">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                @csrf
                
                <!-- Email Address -->
                <div class="space-y-2">
                    <label for="email" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3.5 bg-slate-900/60 border border-slate-800 rounded-2xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/30 transition-all duration-300"
                           placeholder="admin@codeflow.com">
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label for="password" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-3.5 bg-slate-900/60 border border-slate-800 rounded-2xl text-white placeholder-slate-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/30 transition-all duration-300"
                           placeholder="••••••••">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between text-sm text-slate-400">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-800 bg-slate-900 text-cyan-500 focus:ring-0 focus:ring-offset-0">
                        <span>Remember me</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-4 px-6 rounded-2xl font-semibold text-sm text-white bg-gradient-to-r from-cyan-500 to-purple-600 hover:from-purple-600 hover:to-cyan-500 shadow-lg hover:shadow-cyan-500/20 active:scale-[0.98] transition-all duration-300">
                    Authenticate
                </button>
            </form>
        </div>

        <div class="text-center mt-6">
            <a href="{{ url('/') }}" class="text-sm text-slate-500 hover:text-slate-300 transition-colors">
                ← Back to Homepage
            </a>
        </div>
    </div>
</body>
</html>
