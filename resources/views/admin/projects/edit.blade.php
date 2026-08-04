@extends('layouts.admin')

@section('title', 'Edit Project - CodeFlow')
@section('page_title', 'Update Portfolio Project')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Back Navigation -->
    <div class="mb-6">
        <a href="{{ route('admin.projects.index') }}" class="text-sm text-slate-400 hover:text-white flex items-center gap-1.5 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to projects
        </a>
    </div>

    <!-- Form Container -->
    <div class="bg-[#0b132b]/40 backdrop-blur border border-slate-800/80 rounded-3xl p-8 shadow-xl" 
         x-data="{ 
            techInput: '{{ old('tech_stack', $techStackString) }}', 
            get badges() { 
                return this.techInput.split(',').map(t => t.trim()).filter(t => t !== '');
            },
            imageUrl: null,
            previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    this.imageUrl = URL.createObjectURL(file);
                }
            },
            existingImages: {{ json_encode($project->images ?? []) }},
            removeExistingImage(img) {
                this.existingImages = this.existingImages.filter(i => i !== img);
            },
            plans: {{ json_encode($plans) }},
            addPlan() {
                this.plans.push({
                    name: '',
                    price: '',
                    billing_period: 'month',
                    features_input: '',
                    is_popular: false
                });
            },
            removePlan(index) {
                this.plans.splice(index, 1);
            },
            get plansJson() {
                return JSON.stringify(this.plans.map(p => ({
                    name: p.name,
                    price: p.price,
                    billing_period: p.billing_period,
                    features: p.features_input.split(',').map(f => f.trim()).filter(f => f !== ''),
                    is_popular: p.is_popular
                })));
            }
         }">
        
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Project Title -->
                <div class="space-y-2">
                    <label for="title" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">Project Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" required
                           class="w-full px-4 py-3 bg-slate-950/60 border border-slate-800 rounded-2xl text-white placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/20 transition-all"
                           placeholder="e.g. CodeFlow Cloud Platform">
                    @error('title')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Project Category -->
                <div class="space-y-2">
                    <label for="category" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">Category</label>
                    <select id="category" name="category" required
                            class="w-full px-4 py-3 bg-slate-950/60 border border-slate-800 rounded-2xl text-white placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/20 transition-all">
                        <option value="Web Dev" {{ old('category', $project->category) == 'Web Dev' ? 'selected' : '' }}>Web Development</option>
                        <option value="Custom Systems" {{ old('category', $project->category) == 'Custom Systems' ? 'selected' : '' }}>Custom System</option>
                        <option value="Mobile Apps" {{ old('category', $project->category) == 'Mobile Apps' ? 'selected' : '' }}>Mobile Application</option>
                        <option value="UI/UX Design" {{ old('category', $project->category) == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                    </select>
                    @error('category')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Image Upload & Preview -->
            <div class="space-y-2">
                <label class="text-xs font-semibold text-slate-300 uppercase tracking-wider">Thumbnail Image</label>
                <div class="flex flex-col md:flex-row gap-6 items-start">
                    <!-- Upload Dropzone -->
                    <div class="w-full md:w-1/2 relative border-2 border-dashed border-slate-800 hover:border-cyan-500/50 rounded-2xl transition-colors bg-slate-950/30 p-6 flex flex-col items-center justify-center text-center group cursor-pointer">
                        <input type="file" name="thumbnail" id="thumbnail" accept="image/*" @change="previewImage"
                               class="absolute inset-0 opacity-0 cursor-pointer z-10">
                        <svg class="w-10 h-10 text-slate-500 group-hover:text-cyan-400 transition-colors mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span class="text-sm font-semibold text-slate-300">Change thumbnail image</span>
                        <span class="text-xs text-slate-500 mt-1">Leave empty to keep current</span>
                    </div>

                    <!-- Image Preview Area -->
                    <div class="w-full md:w-1/2 space-y-2">
                        <span class="text-[10px] font-semibold text-slate-500 uppercase tracking-wider block">Preview</span>
                        <div class="w-full h-36 rounded-2xl border border-slate-800 bg-slate-950/60 overflow-hidden flex items-center justify-center text-slate-500 relative">
                            <!-- New Preview -->
                            <template x-if="imageUrl">
                                <img :src="imageUrl" class="w-full h-full object-cover">
                            </template>
                            <!-- Current Image -->
                            <template x-if="!imageUrl">
                                <img src="{{ asset('storage/' . $project->thumbnail) }}" class="w-full h-full object-cover">
                            </template>
                        </div>
                    </div>
                </div>
                @error('thumbnail')
                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gallery Slider Images Management -->
            <div class="space-y-4 pt-4 border-t border-slate-800/40">
                <label class="text-xs font-semibold text-slate-300 uppercase tracking-wider block">Project Slider Images (Gallery)</label>
                
                <!-- Upload New Images -->
                <div class="relative border-2 border-dashed border-slate-800 hover:border-cyan-500/50 rounded-2xl transition-colors bg-slate-950/30 p-6 flex flex-col items-center justify-center text-center group cursor-pointer">
                    <input type="file" name="images[]" multiple accept="image/*"
                           class="absolute inset-0 opacity-0 cursor-pointer z-10">
                    <svg class="w-10 h-10 text-slate-500 group-hover:text-cyan-400 transition-colors mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span class="text-sm font-semibold text-slate-300">Click to upload additional screenshots</span>
                    <span class="text-xs text-slate-500 mt-1">Select PNG, JPG, WEBP files</span>
                </div>
                @error('images')
                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                @enderror

                <!-- Existing Gallery Images list -->
                <div class="space-y-2">
                    <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest block">Current Slider Images (Click delete to remove)</span>
                    
                    <template x-if="existingImages.length === 0">
                        <div class="border border-dashed border-slate-800 rounded-xl p-4 text-center text-slate-500 text-xs">
                            No secondary images in the slider.
                        </div>
                    </template>
                    
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <template x-for="(img, idx) in existingImages" :key="img">
                            <div class="relative group rounded-xl border border-slate-800 bg-slate-950/60 aspect-video overflow-hidden">
                                <!-- Hidden input to send remaining files -->
                                <input type="hidden" name="existing_images[]" :value="img">
                                
                                <img :src="'/storage/' + img" class="w-full h-full object-cover">
                                
                                <!-- Delete Overlay -->
                                <button type="button" @click="removeExistingImage(img)" 
                                        class="absolute inset-0 bg-rose-950/80 backdrop-blur-sm opacity-0 group-hover:opacity-100 flex items-center justify-center text-xs font-bold text-white transition-opacity duration-200">
                                    Delete Image
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <label for="description" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">Description</label>
                <textarea id="description" name="description" rows="5" required
                          class="w-full px-4 py-3 bg-slate-950/60 border border-slate-800 rounded-2xl text-white placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/20 transition-all resize-y"
                          placeholder="Provide a detailed description of the project features, architecture, and solutions crafted...">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tech Stack (Reactive Input) -->
            <div class="space-y-2">
                <label for="tech_stack" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">Tech Stack Tags</label>
                <input type="text" id="tech_stack" name="tech_stack" x-model="techInput" required
                       class="w-full px-4 py-3 bg-slate-950/60 border border-slate-800 rounded-2xl text-white placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/20 transition-all"
                       placeholder="e.g. Laravel, Alpine.js, Tailwind CSS, MySQL (Comma separated)">
                
                <!-- Live Tag Previews -->
                <div class="flex flex-wrap gap-2 mt-2 min-h-[1.5rem]">
                    <span class="text-xs text-slate-500 mr-1 self-center">Preview:</span>
                    <template x-for="(badge, index) in badges" :key="index">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-cyan-500/10 text-cyan-400 border border-cyan-500/10" x-text="badge"></span>
                    </template>
                </div>
                @error('tech_stack')
                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Live Demo URL -->
                <div class="space-y-2">
                    <label for="live_demo" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">Live Demo Link</label>
                    <input type="url" id="live_demo" name="live_demo" value="{{ old('live_demo', $project->live_demo) }}"
                           class="w-full px-4 py-3 bg-slate-950/60 border border-slate-800 rounded-2xl text-white placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/20 transition-all"
                           placeholder="https://example.com/demo">
                    @error('live_demo')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- GitHub URL -->
                <div class="space-y-2">
                    <label for="github" class="text-xs font-semibold text-slate-300 uppercase tracking-wider">GitHub Link</label>
                    <input type="url" id="github" name="github" value="{{ old('github', $project->github) }}"
                           class="w-full px-4 py-3 bg-slate-950/60 border border-slate-800 rounded-2xl text-white placeholder-slate-600 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500/20 transition-all"
                           placeholder="https://github.com/codeflow/project">
                    @error('github')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Subscription Plans (Dynamic Widget) -->
            <div class="space-y-4 pt-6 border-t border-slate-800/80">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider">Subscription & Purchase Plans</h3>
                        <p class="text-xs text-slate-500 mt-1">Add pricing tiers or selling plans for this project (e.g. Monthly SaaS, Source Code, Dedicated Setup).</p>
                    </div>
                    <button type="button" @click="addPlan()" 
                            class="px-4 py-2 rounded-xl text-xs font-semibold text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 hover:bg-cyan-500/20 active:scale-[0.98] transition-all flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Add Plan
                    </button>
                </div>

                <!-- Hidden Input to submit JSON data -->
                <input type="hidden" name="plans" :value="plansJson">

                <!-- Empty State -->
                <template x-if="plans.length === 0">
                    <div class="border border-dashed border-slate-800 rounded-2xl p-6 text-center text-slate-500 text-xs">
                        No subscription plans added yet. Click "Add Plan" to start offering pricing plans.
                    </div>
                </template>

                <!-- Plans List -->
                <div class="space-y-4">
                    <template x-for="(plan, index) in plans" :key="index">
                        <div class="relative bg-slate-950/40 border border-slate-800 rounded-2xl p-6 space-y-4">
                            <!-- Plan Header/Remove -->
                            <div class="flex items-center justify-between border-b border-slate-800/60 pb-2">
                                <span class="text-xs font-bold text-cyan-400" x-text="'Plan #' + (index + 1)"></span>
                                <button type="button" @click="removePlan(index)" class="text-xs text-rose-400 hover:text-rose-300 transition-colors">
                                    Remove
                                </button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <!-- Plan Name -->
                                <div class="space-y-1">
                                    <label class="text-[10px] font-semibold text-slate-450 uppercase tracking-wider block">Plan Name</label>
                                    <input type="text" x-model="plan.name" required
                                           class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-655 focus:outline-none focus:border-cyan-500 transition-all"
                                           placeholder="e.g. Premium SaaS">
                                </div>

                                <!-- Plan Price -->
                                <div class="space-y-1">
                                    <label class="text-[10px] font-semibold text-slate-455 uppercase tracking-wider block">Price</label>
                                    <input type="text" x-model="plan.price" required
                                           class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-655 focus:outline-none focus:border-cyan-500 transition-all"
                                           placeholder="e.g. $49 or Custom">
                                </div>

                                <!-- Billing Period -->
                                <div class="space-y-1">
                                    <label class="text-[10px] font-semibold text-slate-455 uppercase tracking-wider block">Billing Period</label>
                                    <select x-model="plan.billing_period" required
                                            class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-655 focus:outline-none focus:border-cyan-500 transition-all">
                                        <option value="month">Per Month</option>
                                        <option value="year">Per Year</option>
                                        <option value="one-time">One-time / Buyout</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                                <!-- Features (Comma separated) -->
                                <div class="md:col-span-2 space-y-1">
                                    <label class="text-[10px] font-semibold text-slate-455 uppercase tracking-wider block">Plan Features (Comma separated)</label>
                                    <input type="text" x-model="plan.features_input" required
                                           class="w-full px-3 py-2 bg-slate-950/80 border border-slate-800 rounded-xl text-xs text-white placeholder-slate-655 focus:outline-none focus:border-cyan-500 transition-all"
                                           placeholder="e.g. Hosting included, Source code access, 24/7 support">
                                </div>

                                <!-- Popular Badge Toggle -->
                                <div class="flex items-center gap-2 pt-4 md:pt-2">
                                    <input type="checkbox" :id="'popular_' + index" x-model="plan.is_popular"
                                           class="w-4 h-4 rounded border-slate-800 bg-slate-950/80 text-cyan-500 focus:ring-0 focus:ring-offset-0">
                                    <label :for="'popular_' + index" class="text-xs font-semibold text-slate-300 select-none cursor-pointer">Highlight as Popular</label>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-800/80">
                <a href="{{ route('admin.projects.index') }}" 
                   class="px-6 py-3.5 rounded-2xl text-sm font-semibold text-slate-400 hover:text-white bg-slate-900 border border-slate-800 hover:bg-slate-800 transition-all">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-8 py-3.5 rounded-2xl text-sm font-semibold text-white bg-gradient-to-r from-cyan-500 to-purple-600 hover:from-purple-600 hover:to-cyan-500 shadow-lg hover:shadow-cyan-500/20 active:scale-[0.98] transition-all">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
