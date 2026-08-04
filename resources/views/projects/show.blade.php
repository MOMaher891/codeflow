@extends('layouts.app')

@section('title', __($project->title) . ' - ' . __('CodeFlow Project Details'))

@section('content')
@php
    $phone = env('WHATSAPP_PHONE', '+201501036198');
    $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
@endphp

<div class="relative min-h-screen pt-24 pb-20">
    <!-- Ambient Neon background glow -->
    <div class="absolute top-12 left-1/2 -translate-x-1/2 w-[80vw] h-[30vw] max-w-[800px] rounded-full bg-gradient-to-r from-cyan-500/10 to-purple-600/10 blur-[130px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Back Navigation & Breadcrumbs -->
        <div class="mb-10 flex items-center justify-between">
            <a href="{{ url('/') }}#projects" class="group inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-900/60 border border-slate-800 hover:border-slate-700 hover:text-white transition-all text-xs font-semibold text-slate-400">
                <svg class="w-4 h-4 rtl:rotate-180 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                {{ __('Back to Showcase') }}
            </a>
            
            <div class="hidden sm:flex items-center gap-2 text-xs text-slate-500">
                <a href="{{ url('/') }}" class="hover:text-slate-400 transition-colors">{{ __('Home') }}</a>
                <span>/</span>
                <a href="{{ url('/') }}#projects" class="hover:text-slate-400 transition-colors">{{ __('Projects') }}</a>
                <span>/</span>
                <span class="text-slate-300 font-semibold">{{ __($project->title) }}</span>
            </div>
        </div>

        <!-- Project Hero Block -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-20">
            <!-- Left Info Panel -->
            <div data-aos="fade-right" class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-900 border border-slate-800 text-xs font-semibold text-cyan-400 shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-400"></span>
                    {{ __($project->category) }}
                </div>

                <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight">
                    {{ __($project->title) }}
                </h1>

                <p class="text-slate-400 text-base sm:text-lg leading-relaxed">
                    {{ __($project->description) }}
                </p>

                <!-- Specs Details Badge Row -->
                <div class="grid grid-cols-2 gap-4 bg-slate-900/40 border border-slate-800/80 p-4 rounded-2xl">
                    <div>
                        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1">{{ __('Architecture') }}</span>
                        <span class="text-sm font-semibold text-slate-200">{{ __('Scalable Clean Code') }}</span>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest block mb-1">{{ __('System Integrity') }}</span>
                        <span class="text-sm font-semibold text-emerald-400 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            {{ __('PROD READY') }}
                        </span>
                    </div>
                </div>

                <!-- Tech Stack Badges -->
                <div class="space-y-3 pt-4 border-t border-slate-900/60">
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider">{{ __('Technologies Deployed') }}</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($project->tech_stack ?? [] as $tech)
                            <span class="px-3 py-1.5 rounded-xl text-xs font-semibold bg-[#0A0F1D] text-slate-300 border border-slate-800 shadow-sm">
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <!-- Demo & Source Actions -->
                <div class="flex flex-wrap items-center gap-4 pt-4">
                    @if($project->live_demo)
                        <a href="{{ $project->live_demo }}" target="_blank" 
                           class="px-8 py-3.5 rounded-2xl font-bold text-sm text-slate-950 bg-gradient-to-r from-cyan-400 to-cyan-300 hover:opacity-95 active:scale-[0.98] shadow-lg shadow-cyan-500/20 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            {{ __('Launch Live Demo') }}
                        </a>
                    @endif

                    @if($project->github)
                        <a href="{{ $project->github }}" target="_blank" 
                           class="px-8 py-3.5 rounded-2xl font-bold text-sm text-white bg-slate-900 border border-slate-800 hover:border-slate-700 active:scale-[0.98] transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482C19.138 20.193 22 16.44 22 12.017 22 6.484 17.522 2 12 2z"/>
                            </svg>
                            {{ __('Explore Source Code') }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Right Visual Mockup Panel -->
            @php
                $slides = array_merge([$project->thumbnail], $project->images ?? []);
                $slides = array_values(array_unique(array_filter($slides)));
            @endphp
            <div data-aos="fade-left" data-aos-delay="200" class="lg:col-span-6 relative">
                <!-- Glowing Outer Rings -->
                <div class="absolute -inset-4 bg-gradient-to-r from-cyan-500/10 to-purple-600/10 rounded-[36px] blur-[20px] pointer-events-none"></div>
                
                <div class="relative bg-slate-900 border border-slate-800 rounded-[32px] overflow-hidden shadow-2xl p-2"
                     x-data="{ 
                        activeSlide: 0, 
                        slides: {{ json_encode($slides) }},
                        next() {
                            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                        },
                        prev() {
                            this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                        }
                     }"
                     x-init="if (slides.length > 1) { setInterval(() => next(), 5000) }">
                    
                    <!-- Slider viewport -->
                    <div class="aspect-video w-full overflow-hidden rounded-[24px] bg-slate-950 relative">
                        <template x-for="(slide, index) in slides" :key="index">
                            <div x-show="activeSlide === index"
                                 x-transition:enter="transition ease-out duration-700"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-350"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute inset-0 w-full h-full">
                                <img :src="'/storage/' + slide" 
                                     class="w-full h-full object-cover">
                            </div>
                        </template>

                        <!-- Optional navigation arrows (hover-triggered overlay) -->
                        <template x-if="slides.length > 1">
                            <div class="absolute inset-0 flex items-center justify-between px-4 opacity-0 hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                <button @click="prev()" class="p-2 rounded-full bg-slate-950/60 border border-slate-800 hover:bg-slate-900 text-white cursor-pointer pointer-events-auto">
                                    <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                </button>
                                <button @click="next()" class="p-2 rounded-full bg-slate-950/60 border border-slate-800 hover:bg-slate-900 text-white cursor-pointer pointer-events-auto">
                                    <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </button>
                            </div>
                        </template>
                    </div>

                    <!-- Slide Navigation Dots -->
                    <template x-if="slides.length > 1">
                        <div class="flex items-center justify-center gap-1.5 mt-4 pb-2">
                            <template x-for="(slide, index) in slides" :key="index">
                                <button @click="activeSlide = index"
                                        class="w-2 h-2 rounded-full transition-all duration-300 cursor-pointer"
                                        :class="activeSlide === index ? 'bg-cyan-400 w-5' : 'bg-slate-700 hover:bg-slate-600'"></button>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Pricing & Subscription Tiers Grid -->
        <div class="space-y-12">
            <div data-aos="fade-up" class="text-center max-w-3xl mx-auto space-y-4">
                <h2 class="text-xs font-bold text-cyan-400 uppercase tracking-widest">{{ __('Pricing & Plans') }}</h2>
                <p class="text-3xl sm:text-4xl font-bold text-white">{{ __('Choose Your Licensing Option') }}</p>
                <p class="text-slate-500 text-sm">
                    {{ __('Select the subscription tier or buyout license that best matches your deployment needs. All transactions are securely completed via WhatsApp verification.') }}
                </p>
            </div>

            @if(empty($project->plans) || count($project->plans) === 0)
                <div data-aos="fade-up" data-aos-delay="100" class="bg-[#0b132b]/20 border border-slate-900 rounded-3xl p-12 text-center text-slate-500">
                    <p class="text-base font-semibold text-white">{{ __('Plans Custom-Tailored on Request') }}</p>
                    <p class="text-sm mt-1 max-w-md mx-auto">{{ __('Pricing plans for this system are structured based on scope and deployment needs. Contact us directly to configure details.') }}</p>
                    
                    <a href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode("Hello CodeFlow! I am interested in custom plans for the project: " . $project->title) }}" 
                       target="_blank" 
                       class="mt-6 inline-flex items-center gap-2 px-6 py-3 rounded-2xl font-semibold text-xs text-slate-950 bg-cyan-400 hover:opacity-90 transition-all">
                        {{ __('Consult with Us') }}
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">
                    @foreach($project->plans as $plan)
                        @php
                            $isPopular = isset($plan['is_popular']) && ($plan['is_popular'] === true || $plan['is_popular'] === 'true' || $plan['is_popular'] == 1);
                            
                            // Prefilled whatsapp checkout text
                            $waMessage = "Hello CodeFlow!\n\n"
                                       . "I want to subscribe to/buy the following plan:\n"
                                       . "Project: *" . $project->title . "*\n"
                                       . "Licensing Plan: *" . $plan['name'] . "*\n"
                                       . "Pricing: *" . $plan['price'] . " / " . __($plan['billing_period']) . "*\n\n"
                                       . "Please let me know how to start the setup process.";
                            $waUrl = "https://wa.me/" . $cleanPhone . "?text=" . urlencode($waMessage);
                        @endphp
                        
                        <div data-aos="fade-up" data-aos-delay="{{ (($loop->index % 3) + 1) * 100 }}" class="group relative rounded-3xl p-6 sm:p-8 flex flex-col justify-between transition-all duration-300 {{ $isPopular ? 'bg-slate-900/60 border-2 border-cyan-400 shadow-2xl scale-[1.03] lg:scale-[1.05] z-10' : 'bg-slate-900/20 border border-slate-800/80 hover:border-slate-700' }}">
                            
                            @if($isPopular)
                                <!-- Glow header tag -->
                                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 text-white shadow-md">
                                    {{ __('Most Popular') }}
                                </div>
                            @endif

                            <div class="space-y-6">
                                <!-- Plan Identity -->
                                <div>
                                    <h3 class="text-lg font-bold text-white">{{ $plan['name'] }}</h3>
                                    <div class="mt-4 flex items-baseline gap-1 text-white">
                                        <span class="text-4xl font-extrabold tracking-tight">{{ $plan['price'] }}</span>
                                        <span class="text-sm font-semibold text-slate-500">
                                            @if($plan['billing_period'] == 'month')
                                                /{{ __('mo') }}
                                            @elseif($plan['billing_period'] == 'year')
                                                /{{ __('yr') }}
                                            @else
                                                /{{ __('one-time') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <!-- Features List -->
                                <ul role="list" class="space-y-4 border-t border-slate-800/60 pt-6">
                                    @foreach($plan['features'] ?? [] as $feature)
                                        <li class="flex items-start gap-3 text-xs text-slate-300">
                                            <span class="w-5 h-5 rounded-full bg-cyan-400/10 flex items-center justify-center text-cyan-400 shrink-0 mt-0.5">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </span>
                                            <span class="leading-normal">{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- CTA Button -->
                            <div class="pt-8 mt-auto">
                                <a href="{{ $waUrl }}" target="_blank" 
                                   class="w-full text-center block px-6 py-3.5 rounded-2xl font-bold text-xs transition-all active:scale-[0.98] cursor-pointer {{ $isPopular ? 'text-slate-950 bg-gradient-to-r from-cyan-400 to-cyan-300 hover:opacity-95 shadow-md' : 'text-white bg-slate-900 border border-slate-800 hover:border-slate-700' }}">
                                    @if($plan['billing_period'] == 'one-time')
                                        {{ __('Acquire Software') }}
                                    @else
                                        {{ __('Subscribe Now') }}
                                    @endif
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
