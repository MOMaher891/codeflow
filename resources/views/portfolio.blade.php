@extends('layouts.app')

@section('title', __('CodeFlow - Premium Software House & Development Portfolio'))

@section('content')
<!-- Hero Section -->
<section id="hero" class="relative min-h-[90vh] flex items-center justify-center pt-20 overflow-hidden">
    <!-- Ambient glowing backgrounds -->
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] h-[40vw] max-w-[800px] rounded-full bg-gradient-to-r from-cyan-500/10 to-purple-600/10 blur-[130px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10 py-12">
        <!-- Left Column: Copy & CTAs -->
        <div class="lg:col-span-7 space-y-8 text-center lg:ltr:text-left lg:rtl:text-right">
            <!-- Badge -->
            <div data-aos="fade-up" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-900 border border-slate-800 text-xs font-semibold tracking-wide text-cyan-400">
                <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
                {{ __('Now Booking Projects for Q3/Q4') }}
            </div>

            <!-- Title -->
            <h1 data-aos="fade-up" data-aos-delay="100" class="text-4xl sm:text-6xl font-extrabold tracking-tight text-white leading-tight">
                {!! __('Crafting High-End <br> Digital Ecosystems <br> for Tech Leaders.') !!}
            </h1>

            <!-- Subtitle -->
            <p data-aos="fade-up" data-aos-delay="200" class="text-slate-400 text-lg max-w-2xl mx-auto lg:ltr:mr-auto lg:ltr:ml-0 lg:rtl:ml-auto lg:rtl:mr-0">
                {{ __('CodeFlow is a premium software boutique specializing in bespoke web development, custom system architectures, and stunning mobile apps built to scale.') }}
            </p>

            <!-- CTA Buttons -->
            <div data-aos="fade-up" data-aos-delay="300" class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                <a href="#projects" class="w-full sm:w-auto text-center px-8 py-4 rounded-2xl font-bold text-sm text-slate-950 bg-gradient-to-r from-cyan-400 via-cyan-300 to-blue-400 hover:opacity-90 active:scale-[0.98] shadow-lg shadow-cyan-500/20 transition-all duration-300">
                    {{ __('Explore Our Work') }}
                </a>
                <a href="#contact" class="w-full sm:w-auto text-center px-8 py-4 rounded-2xl font-bold text-sm text-white bg-slate-900 border border-slate-800 hover:border-slate-700 active:scale-[0.98] transition-all">
                    {{ __("Let's Build Together") }}
                </a>
            </div>
            
            <!-- Features Row -->
            <div data-aos="fade-up" data-aos-delay="400" class="pt-8 border-t border-slate-900 grid grid-cols-3 gap-6 max-w-md mx-auto lg:ltr:mr-auto lg:ltr:ml-0 lg:rtl:ml-auto lg:rtl:mr-0 ltr:text-left rtl:text-right">
                <div>
                    <h4 class="text-xl font-bold text-white">99%</h4>
                    <p class="text-xs text-slate-500 mt-1">{{ __('Client Satisfaction') }}</p>
                </div>
                <div>
                    <h4 class="text-xl font-bold text-white">40+</h4>
                    <p class="text-xs text-slate-500 mt-1">{{ __('Projects Delivered') }}</p>
                </div>
                <div>
                    <h4 class="text-xl font-bold text-white">5x</h4>
                    <p class="text-xs text-slate-500 mt-1">{{ __('Performance Index') }}</p>
                </div>
            </div>
        </div>

        <!-- Right Column: Interactive Tech Visual Mockup -->
        <div data-aos="zoom-in-left" data-aos-delay="350" class="lg:col-span-5 hidden lg:block relative">
            <div class="relative w-full aspect-square max-w-[450px] mx-auto">
                <!-- Glowing Outer Rings (Dashed to make rotation visible) -->
                <div class="absolute inset-0 border-2 border-dashed border-cyan-500/20 rounded-full animate-spin [animation-duration:40s]"></div>
                <div class="absolute inset-8 border-2 border-dashed border-purple-500/20 rounded-full animate-spin [animation-duration:25s] [animation-direction:reverse]"></div>
                
                <!-- Main Glass Card -->
                <div class="absolute inset-16 bg-[#0b132b]/40 backdrop-blur-xl border border-slate-800 rounded-3xl p-6 shadow-2xl flex flex-col justify-between" dir="ltr"
                     x-data="{
                        snippets: [
                            { file: 'codeflow.config.js', code: 'const codeFlow = {\n  engine: \'Laravel 12\',\n  styling: \'Tailwind CSS\',\n  reactiveUI: \'Alpine.js\',\n  focus: [\'Speed\', \'Aesthetics\']\n};\nexport default codeFlow;' },
                            { file: 'routes/web.php', code: '// routes/web.php\nRoute::get(\'/api/projects\', function () {\n  return Project::with(\'plans\')\n    ->latest()\n    ->get();\n});' },
                            { file: 'pricing.js', code: '// Alpine.js Loader\nAlpine.data(\'pricing\', () => ({\n  plans: [],\n  addPlan(plan) {\n    this.plans.push(plan);\n  }\n}));' },
                            { file: 'theme.css', code: '/* Tailwind Theme */\n@theme {\n  --color-primary: #0A0F1D;\n  --color-cyan: #06B6D4;\n  --color-purple: #A855F7;\n}' }
                        ],
                        currentIdx: 0,
                        displayedText: '',
                        typingSpeed: 30,
                        eraseSpeed: 15,
                        delayBeforeErase: 3000,
                        delayBeforeType: 500,
                        
                        init() {
                            this.type();
                        },
                        
                        type() {
                            let text = this.snippets[this.currentIdx].code;
                            let i = 0;
                            let timer = setInterval(() => {
                                if (i < text.length) {
                                    this.displayedText += text.charAt(i);
                                    i++;
                                } else {
                                    clearInterval(timer);
                                    setTimeout(() => this.erase(), this.delayBeforeErase);
                                }
                            }, this.typingSpeed);
                        },
                        
                        erase() {
                            let timer = setInterval(() => {
                                if (this.displayedText.length > 0) {
                                    this.displayedText = this.displayedText.substring(0, this.displayedText.length - 1);
                                } else {
                                    clearInterval(timer);
                                    this.currentIdx = (this.currentIdx + 1) % this.snippets.length;
                                    setTimeout(() => this.type(), this.delayBeforeType);
                                }
                            }, this.eraseSpeed);
                        }
                     }">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1.5">
                            <span class="w-3 h-3 rounded-full bg-rose-500/80"></span>
                            <span class="w-3 h-3 rounded-full bg-amber-500/80"></span>
                            <span class="w-3 h-3 rounded-full bg-emerald-500/80"></span>
                        </div>
                        <span class="text-xs text-slate-500 font-mono" x-text="snippets[currentIdx].file"></span>
                    </div>

                    <!-- Fixed height typewriter area to prevent layout shifting -->
                    <div class="font-mono text-[11px] text-cyan-400 mt-4 h-36 overflow-hidden ltr text-left">
                        <pre class="whitespace-pre-wrap break-all text-cyan-400/90 leading-relaxed font-mono select-none inline" x-text="displayedText"></pre><span class="inline-block w-1.5 h-3.5 bg-cyan-400/95 animate-pulse ml-1 align-middle"></span>
                    </div>

                    <!-- Glowing Tag -->
                    <div class="mt-6 flex items-center justify-between border-t border-slate-900 pt-4">
                        <span class="text-xs text-slate-400">{{ __('System Integrity') }}</span>
                        <span class="px-2.5 py-1 rounded bg-emerald-500/10 text-emerald-400 text-[10px] font-semibold border border-emerald-500/20">{{ __('OPERATIONAL') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-24 border-t border-slate-900/60 relative">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Section Header -->
        <div data-aos="fade-up" class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <h2 class="text-xs font-bold text-cyan-400 uppercase tracking-widest">{{ __('Capabilities') }}</h2>
            <p class="text-3xl sm:text-4xl font-bold text-white">{{ __('Engineered for Digital Performance') }}</p>
            <p class="text-slate-500 text-sm">{{ __('We combine bleeding-edge technology with high-end designs to build products that command attention.') }}</p>
        </div>

        <!-- Service Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Web Development Card -->
            <div data-aos="fade-up" data-aos-delay="100" class="group relative bg-[#0b132b]/25 border border-slate-900 hover:border-cyan-500/30 rounded-3xl p-6 sm:p-8 hover:bg-[#0b132b]/40 shadow-xl transition-all duration-500 hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover:opacity-100 rounded-3xl transition-opacity duration-500"></div>
                <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">{{ __('Web Development') }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-4">{{ __('Bespoke high-speed websites, platforms, and SaaS products built with Laravel, Tailwind, and React/Alpine.') }}</p>
                <span class="text-xs font-semibold text-cyan-400 flex items-center gap-1 group-hover:gap-2 transition-all">
                    {{ __('Learn more') }} <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            </div>

            <!-- Custom Systems Card -->
            <div data-aos="fade-up" data-aos-delay="200" class="group relative bg-[#0b132b]/25 border border-slate-900 hover:border-purple-500/30 rounded-3xl p-6 sm:p-8 hover:bg-[#0b132b]/40 shadow-xl transition-all duration-500 hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-transparent opacity-0 group-hover:opacity-100 rounded-3xl transition-opacity duration-500"></div>
                <div class="w-12 h-12 rounded-2xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-purple-400 mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">{{ __('Custom Systems') }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-4">{{ __('Enterprise integrations, APIs, server setups, automated CRM databases, and back-office solutions.') }}</p>
                <span class="text-xs font-semibold text-purple-400 flex items-center gap-1 group-hover:gap-2 transition-all">
                    {{ __('Learn more') }} <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            </div>

            <!-- Mobile Apps Card -->
            <div data-aos="fade-up" data-aos-delay="300" class="group relative bg-[#0b132b]/25 border border-slate-900 hover:border-blue-500/30 rounded-3xl p-6 sm:p-8 hover:bg-[#0b132b]/40 shadow-xl transition-all duration-500 hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-transparent opacity-0 group-hover:opacity-100 rounded-3xl transition-opacity duration-500"></div>
                <div class="w-12 h-12 rounded-2xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">{{ __('Mobile Applications') }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-4">{{ __('Stunning, fluid native and cross-platform iOS & Android mobile applications built for the App Store.') }}</p>
                <span class="text-xs font-semibold text-blue-400 flex items-center gap-1 group-hover:gap-2 transition-all">
                    {{ __('Learn more') }} <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Projects Showcase Section -->
<section id="projects" class="py-24 border-t border-slate-900/60 relative">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Section Header -->
        <div data-aos="fade-up" class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4">
            <div class="space-y-4">
                <h2 class="text-xs font-bold text-cyan-400 uppercase tracking-widest">{{ __('Our Work') }}</h2>
                <p class="text-3xl sm:text-4xl font-bold text-white">{{ __('The Project Showcases') }}</p>
                <p class="text-slate-500 text-sm max-w-xl">{{ __('Explore our latest software products and custom web systems. Built to exceed visual and performance standards.') }}</p>
            </div>
            
            <!-- Category Filter / Badges (Visual Only) -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0">
                <span class="px-4 py-2 rounded-full text-xs font-semibold bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">{{ __('All Projects') }}</span>
            </div>
        </div>

        @if($projects->isEmpty())
            <!-- Empty Projects Handler -->
            <div class="bg-[#0b132b]/20 border border-slate-900 rounded-3xl p-16 text-center text-slate-500">
                <svg class="w-12 h-12 mx-auto text-slate-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <p class="text-lg font-semibold text-white">{{ __('Under Construction') }}</p>
                <p class="text-sm mt-1">{{ __('Our portfolio projects will be published here shortly. Stay tuned!') }}</p>
            </div>
        @else
            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <!-- Project Card -->
                    <article data-aos="fade-up" data-aos-delay="{{ (($loop->index % 3) + 1) * 100 }}" class="group relative bg-[#0b132b]/25 border border-slate-900 hover:border-slate-800 rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 flex flex-col justify-between"
                             x-data="{ rotateX: 0, rotateY: 0 }"
                             @mousemove="
                                const card = $el.getBoundingClientRect();
                                const x = $event.clientX - card.left;
                                const y = $event.clientY - card.top;
                                rotateX = ((y / card.height) - 0.5) * -10;
                                rotateY = ((x / card.width) - 0.5) * 10;
                             "
                             @mouseleave="rotateX = 0; rotateY = 0;"
                             :style="`transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg);`"
                             style="transform-style: preserve-3d; will-change: transform;">
                        
                        <!-- Glow effect on hover -->
                        <div class="absolute -inset-px bg-gradient-to-r from-cyan-500/20 to-purple-600/20 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none z-0"></div>

                        <div class="relative z-10 flex flex-col h-full justify-between">
                            <!-- Image Container -->
                            <div class="aspect-video w-full overflow-hidden bg-slate-900 border-b border-slate-900/60 relative">
                                <img src="{{ asset('storage/' . $project->thumbnail) }}" 
                                     alt="{{ __($project->title) }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <!-- Category Badge -->
                                <span class="absolute top-4 ltr:left-4 rtl:right-4 px-3 py-1 rounded-full text-[10px] font-bold tracking-wide uppercase bg-[#0A0F1D]/80 backdrop-blur-md text-cyan-400 border border-cyan-500/20 shadow-md">
                                    {{ __($project->category) }}
                                </span>
                            </div>

                            <!-- Content -->
                            <div class="p-6 space-y-4 flex-grow flex flex-col justify-between">
                                <div class="space-y-2">
                                    <h3 class="text-xl font-bold text-white group-hover:text-cyan-400 transition-colors line-clamp-1">{{ __($project->title) }}</h3>
                                    <p class="text-slate-400 text-sm line-clamp-2 leading-relaxed">{{ __($project->description) }}</p>
                                </div>

                                <!-- Tech Badges -->
                                <div class="space-y-4 pt-4 border-t border-slate-900/60">
                                    <div class="flex flex-wrap gap-1.5">
                                        @foreach(array_slice($project->tech_stack ?? [], 0, 4) as $tech)
                                            <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-900 text-slate-400 border border-slate-800">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                        @if(count($project->tech_stack ?? []) > 4)
                                            <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-900 text-slate-400 border border-slate-800">
                                                +{{ count($project->tech_stack) - 4 }} {{ __('more') }}
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <!-- Buttons -->
                                    <div class="flex items-center gap-3 w-full">
                                        <!-- View Details Trigger -->
                                        <a href="{{ route('projects.show', $project->id) }}" 
                                           class="flex-grow text-center px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-slate-900 border border-slate-800 hover:border-slate-700 transition-all">
                                            {{ __('View Details') }}
                                        </a>
                                        @if($project->live_demo)
                                            <a href="{{ $project->live_demo }}" target="_blank" 
                                               class="px-4 py-2.5 rounded-xl text-xs font-bold text-slate-950 bg-gradient-to-r from-cyan-400 to-cyan-300 hover:opacity-90 transition-all flex items-center gap-1">
                                                {{ __('Live') }} <svg class="w-3.5 h-3.5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-24 border-t border-slate-900/60 relative">
    <!-- Ambient background glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[70vw] h-[25vw] max-w-[600px] rounded-full bg-gradient-to-r from-purple-500/5 to-cyan-500/5 blur-[120px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div data-aos="fade-up" class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <h2 class="text-xs font-bold text-cyan-400 uppercase tracking-widest">{{ __('What Our Clients Say') }}</h2>
            <p class="text-3xl sm:text-4xl font-bold text-white">{{ __('Trusted by Business Leaders') }}</p>
            <p class="text-slate-500 text-sm">{{ __('Explore real feedback from enterprise leaders and SaaS founders who built their systems with CodeFlow.') }}</p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div data-aos="fade-up" data-aos-delay="100" class="group relative bg-[#0b132b]/25 border border-slate-800 hover:border-cyan-500/30 rounded-3xl p-6 sm:p-8 hover:bg-[#0b132b]/40 shadow-xl transition-all duration-500 hover:-translate-y-1 flex flex-col justify-between">
                <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-transparent opacity-0 group-hover:opacity-100 rounded-3xl transition-opacity duration-500"></div>
                
                <div>
                    <!-- Card Top: Service Tag & Stars -->
                    <div class="flex flex-row items-center justify-between gap-4 mb-6">
                        <!-- Service Tag -->
                        <span class="px-2.5 py-1 rounded text-[9px] font-bold uppercase tracking-wider bg-cyan-500/10 text-cyan-400 border border-cyan-500/10 shrink-0">{{ __('Enterprise ERP') }}</span>
                        
                        <!-- Rating Stars -->
                        <div class="flex items-center gap-0.5 text-amber-400 shrink-0">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-3.5 h-3.5 fill-amber-400 text-amber-400" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                    </div>

                    <!-- Quote Text -->
                    <p class="text-slate-300 text-sm leading-relaxed mb-8 italic relative z-10">
                        "{{ __('We contracted CodeFlow to develop an integrated ERP system for our warehouses and fleet management. The result was amazing; speed, stability, and outstanding support allowed us to automate operations completely.') }}"
                    </p>
                </div>

                <!-- Client Profile -->
                <div class="flex items-center gap-4 pt-6 border-t border-slate-800/60 mt-auto">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-cyan-400 via-blue-500 to-indigo-600 flex items-center justify-center text-white font-extrabold text-sm shrink-0 select-none shadow-lg shadow-cyan-500/10">
                        TM
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white group-hover:text-cyan-400 transition-colors">{{ __('Eng. Tarek Mansour') }}</h4>
                        <span class="text-[10px] font-semibold text-slate-500 block mt-0.5">{{ __('CTO, Al-Majd Logistics') }}</span>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div data-aos="fade-up" data-aos-delay="200" class="group relative bg-[#0b132b]/25 border border-slate-800 hover:border-purple-500/30 rounded-3xl p-6 sm:p-8 hover:bg-[#0b132b]/40 shadow-xl transition-all duration-500 hover:-translate-y-1 flex flex-col justify-between">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-transparent opacity-0 group-hover:opacity-100 rounded-3xl transition-opacity duration-500"></div>
                
                <div>
                    <!-- Card Top: Service Tag & Stars -->
                    <div class="flex flex-row items-center justify-between gap-4 mb-6">
                        <!-- Service Tag -->
                        <span class="px-2.5 py-1 rounded text-[9px] font-bold uppercase tracking-wider bg-purple-500/10 text-purple-400 border border-purple-500/10 shrink-0">{{ __('SaaS Platform & App') }}</span>
                        
                        <!-- Rating Stars -->
                        <div class="flex items-center gap-0.5 text-amber-400 shrink-0">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-3.5 h-3.5 fill-amber-400 text-amber-400" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                    </div>

                    <!-- Quote Text -->
                    <p class="text-slate-300 text-sm leading-relaxed mb-8 italic relative z-10">
                        "{{ __('The mobile app and cloud platform developed by CodeFlow exceeded expectations. The UI/UX design is luxurious and attractive, and user experience is very smooth. Great success partners!') }}"
                    </p>
                </div>

                <!-- Client Profile -->
                <div class="flex items-center gap-4 pt-6 border-t border-slate-800/60 mt-auto">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-purple-400 via-pink-500 to-red-500 flex items-center justify-center text-white font-extrabold text-sm shrink-0 select-none shadow-lg shadow-purple-500/10">
                        SA
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white group-hover:text-purple-400 transition-colors">{{ __('Dr. Sarah Al-Otaibi') }}</h4>
                        <span class="text-[10px] font-semibold text-slate-500 block mt-0.5">{{ __('CEO, Edura EdTech') }}</span>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div data-aos="fade-up" data-aos-delay="300" class="group relative bg-[#0b132b]/25 border border-slate-800 hover:border-emerald-500/30 rounded-3xl p-6 sm:p-8 hover:bg-[#0b132b]/40 shadow-xl transition-all duration-500 hover:-translate-y-1 flex flex-col justify-between">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-transparent opacity-0 group-hover:opacity-100 rounded-3xl transition-opacity duration-500"></div>
                
                <div>
                    <!-- Card Top: Service Tag & Stars -->
                    <div class="flex flex-row items-center justify-between gap-4 mb-6">
                        <!-- Service Tag -->
                        <span class="px-2.5 py-1 rounded text-[9px] font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-400 border border-emerald-500/10 shrink-0">{{ __('Fintech Gateway') }}</span>
                        
                        <!-- Rating Stars -->
                        <div class="flex items-center gap-0.5 text-amber-400 shrink-0">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-3.5 h-3.5 fill-amber-400 text-amber-400" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                    </div>

                    <!-- Quote Text -->
                    <p class="text-slate-300 text-sm leading-relaxed mb-8 italic relative z-10">
                        "{{ __('Infinite precision in code engineering and a very strong security system. Security and transaction speed were our priorities, and CodeFlow delivered an integrated software solution matching the highest financial standards.') }}"
                    </p>
                </div>

                <!-- Client Profile -->
                <div class="flex items-center gap-4 pt-6 border-t border-slate-800/60 mt-auto">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-emerald-400 via-teal-500 to-cyan-500 flex items-center justify-center text-white font-extrabold text-sm shrink-0 select-none shadow-lg shadow-emerald-500/10">
                        AM
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-white group-hover:text-emerald-400 transition-colors">{{ __('Ahmed Al-Mutairi') }}</h4>
                        <span class="text-[10px] font-semibold text-slate-500 block mt-0.5">{{ __('Founder, PayFlow Fintech') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section id="contact" class="py-24 border-t border-slate-900/60 relative">
    <!-- background glow -->
    <div class="absolute bottom-1/4 left-1/4 w-[400px] h-[400px] rounded-full bg-cyan-500/5 blur-[120px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            <!-- Left Info Block -->
            <div data-aos="fade-right" class="lg:col-span-5 space-y-8">
                <div class="space-y-4">
                    <h2 class="text-xs font-bold text-cyan-400 uppercase tracking-widest">{{ __('Connect') }}</h2>
                    <p class="text-3xl sm:text-4xl font-bold text-white leading-tight">{{ __('Let\'s Create Your Digital Product') }}</p>
                    <p class="text-slate-500 text-sm leading-relaxed">{{ __('Have an idea or a scoped project? Let\'s kick off a conversation. Fill out the quick details, and we will connect instantly on WhatsApp to discuss rates and availability.') }}</p>
                </div>

                <!-- Info Cards -->
                <div class="space-y-4">
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-[#0b132b]/20 border border-slate-900">
                        <div class="w-10 h-10 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs text-slate-500 block">{{ __('Direct Email') }}</span>
                            <a href="mailto:codeflow.help@gmail.com" class="text-sm font-semibold text-white hover:text-cyan-400 transition-colors">codeflow.help@gmail.com</a>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-[#0b132b]/20 border border-slate-900">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center text-emerald-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs text-slate-500 block">{{ __('Company Phone') }}</span>
                            <a href="tel:+201505512444" class="text-sm font-semibold text-white hover:text-emerald-400 transition-colors" dir="ltr">+201505512444</a>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-[#0b132b]/20 border border-slate-900">
                        <div class="w-10 h-10 rounded-xl bg-purple-500/10 flex items-center justify-center text-purple-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs text-slate-500 block">{{ __('Headquarters') }}</span>
                            <span class="text-sm font-semibold text-white">{{ __('Egypt / Cairo') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Contact Form Card -->
            <div data-aos="fade-left" data-aos-delay="200" class="lg:col-span-7 bg-[#0b132b]/30 backdrop-blur-xl border border-slate-900 rounded-3xl p-6 sm:p-8 shadow-xl">
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Your Name -->
                        <div class="space-y-2">
                            <label for="name" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">{{ __('Your Name') }}</label>
                            <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                   class="w-full px-4 py-3.5 bg-slate-950/60 border border-slate-900 rounded-2xl text-white placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/20 transition-all"
                                   placeholder="{{ __('Jane Doe') }}">
                        </div>

                        <!-- Email Address -->
                        <div class="space-y-2">
                            <label for="email" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">{{ __('Email Address') }}</label>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                   class="w-full px-4 py-3.5 bg-slate-950/60 border border-slate-900 rounded-2xl text-white placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/20 transition-all"
                                   placeholder="jane@company.com">
                        </div>
                    </div>

                    <!-- Service dropdown -->
                    <div class="space-y-2">
                        <label for="service" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">{{ __('Required Service') }}</label>
                        <select id="service" name="service" required
                                class="w-full px-4 py-3.5 bg-slate-950/60 border border-slate-900 rounded-2xl text-white placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/20 transition-all">
                            <option value="" disabled selected>{{ __('Select service focus...') }}</option>
                            <option value="Web Development" {{ old('service') == 'Web Development' ? 'selected' : '' }}>{{ __('Web Development') }}</option>
                            <option value="Custom System Architecture" {{ old('service') == 'Custom System Architecture' ? 'selected' : '' }}>{{ __('Custom System Architecture') }}</option>
                            <option value="Mobile App Development" {{ old('service') == 'Mobile App Development' ? 'selected' : '' }}>{{ __('Mobile App Development') }}</option>
                            <option value="UI/UX Engineering" {{ old('service') == 'UI/UX Engineering' ? 'selected' : '' }}>{{ __('UI/UX Engineering') }}</option>
                        </select>
                    </div>

                    <!-- Message -->
                    <div class="space-y-2">
                        <label for="message" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">{{ __('Project Scope / Details') }}</label>
                        <textarea id="message" name="message" rows="5" required
                                  class="w-full px-4 py-3.5 bg-slate-950/60 border border-slate-900 rounded-2xl text-white placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/20 transition-all resize-y"
                                  placeholder="{{ __('Describe the project goal, timelines, and primary features...') }}"></textarea>
                    </div>

                    <!-- Submit CTA Button -->
                    <button type="submit" 
                            class="w-full py-4 px-6 rounded-2xl font-bold text-sm text-slate-950 bg-gradient-to-r from-cyan-400 via-cyan-300 to-blue-400 hover:opacity-90 active:scale-[0.98] shadow-lg shadow-cyan-500/20 transition-all duration-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 text-slate-900" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12c0 2.17.61 4.19 1.66 5.92L2.51 22l4.25-1.12C8.36 21.52 10.12 22 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2zm5.07 13.9c-.27.76-1.59 1.48-2.2 1.54-.54.05-1.24.08-3.03-.66-2.28-.94-3.71-3.27-3.83-3.43-.11-.16-.94-1.25-.94-2.38 0-1.14.6-1.69.81-1.92.21-.23.47-.29.62-.29h.44c.15 0 .35-.06.55.43.2.49.69 1.68.75 1.8.06.12.1.26.02.43-.08.17-.12.27-.24.42-.12.15-.26.33-.37.44-.12.12-.25.26-.11.5.14.24.62 1.02 1.33 1.65.91.81 1.68 1.06 1.92 1.18.24.12.38.1.52-.06.14-.17.62-.72.78-.97.16-.25.32-.21.55-.12s1.46.69 1.71.82c.25.13.42.19.48.3.06.11.06.66-.21 1.42z"/></svg>
                        {{ __('Redirect to WhatsApp Chat') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
