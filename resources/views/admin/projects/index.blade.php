@extends('layouts.admin')

@section('title', 'Manage Projects - CodeFlow')
@section('page_title', 'Projects Repository')

@section('content')
<div class="space-y-6">
    <!-- Action Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-white tracking-tight">Active Portfolio Items</h2>
            <p class="text-sm text-slate-400">Total Projects: {{ $projects->count() }}</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" 
           class="flex items-center gap-2 px-5 py-3 rounded-2xl text-sm font-semibold text-white bg-gradient-to-r from-cyan-500 to-purple-600 hover:from-purple-600 hover:to-cyan-500 shadow-lg hover:shadow-cyan-500/10 active:scale-[0.98] transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add New Project
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-[#0b132b]/40 backdrop-blur border border-slate-800/80 rounded-3xl overflow-hidden shadow-xl">
        @if($projects->isEmpty())
            <div class="p-16 text-center text-slate-400 space-y-4">
                <svg class="w-16 h-16 mx-auto text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                <div class="space-y-1">
                    <p class="text-lg font-semibold text-white">No projects found</p>
                    <p class="text-sm">Get started by creating your first portfolio showcase item.</p>
                </div>
                <a href="{{ route('admin.projects.create') }}" class="inline-block mt-2 text-cyan-400 hover:text-cyan-300 text-sm font-medium transition-colors">
                    Create a project →
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-800/80 bg-[#060a13]/40 text-slate-400 text-xs font-semibold uppercase tracking-wider">
                            <th class="px-6 py-4">Thumbnail</th>
                            <th class="px-6 py-4">Project Details</th>
                            <th class="px-6 py-4">Category</th>
                            <th class="px-6 py-4">Tech Stack</th>
                            <th class="px-6 py-4">Links</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 text-slate-300 text-sm">
                        @foreach($projects as $project)
                            <tr class="hover:bg-slate-800/10 transition-colors">
                                <!-- Thumbnail -->
                                <td class="px-6 py-4 shrink-0">
                                    <div class="w-16 h-12 rounded-xl border border-slate-800 bg-slate-900 overflow-hidden shrink-0">
                                        <img src="{{ asset('storage/' . $project->thumbnail) }}" 
                                             alt="{{ $project->title }}" 
                                             class="w-full h-full object-cover object-center">
                                    </div>
                                </td>
                                
                                <!-- Title / Description -->
                                <td class="px-6 py-4 max-w-xs">
                                    <div class="font-semibold text-white text-base truncate">{{ $project->title }}</div>
                                    <div class="text-xs text-slate-400 mt-1 truncate">{{ Str::limit($project->description, 60) }}</div>
                                </td>
                                
                                <!-- Category -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-cyan-500/10 text-cyan-400 border border-cyan-500/10">
                                        {{ $project->category }}
                                    </span>
                                </td>
                                
                                <!-- Tech Stack -->
                                <td class="px-6 py-4 max-w-xs">
                                    <div class="flex flex-wrap gap-1.5">
                                        @foreach($project->tech_stack ?? [] as $tech)
                                            <span class="px-2 py-0.5 rounded-md text-[10px] font-medium bg-slate-800 text-slate-300 border border-slate-700/60">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                
                                <!-- Links -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        @if($project->live_demo)
                                            <a href="{{ $project->live_demo }}" target="_blank" class="text-cyan-400 hover:text-cyan-300 transition-colors" title="Live Demo">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                            </a>
                                        @else
                                            <span class="text-slate-600">-</span>
                                        @endif
                                        @if($project->github)
                                            <a href="{{ $project->github }}" target="_blank" class="text-slate-400 hover:text-white transition-colors" title="GitHub Source">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482C19.138 20.193 22 16.44 22 12.017 22 6.484 17.522 2 12 2z"/></svg>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-3">
                                        <!-- Edit -->
                                        <a href="{{ route('admin.projects.edit', $project->id) }}" 
                                           class="text-cyan-400 hover:text-cyan-300 bg-cyan-500/10 hover:bg-cyan-500/20 px-3.5 py-1.5 rounded-xl border border-cyan-500/10 transition-all">
                                            Edit
                                        </a>
                                        <!-- Delete Form -->
                                        <form id="delete-form-{{ $project->id }}" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                    onclick="confirmDelete('{{ $project->id }}', '{{ addslashes($project->title) }}')"
                                                    class="text-rose-400 hover:text-rose-300 bg-rose-500/10 hover:bg-rose-500/20 px-3.5 py-1.5 rounded-xl border border-rose-500/10 transition-all">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

<script>
    function confirmDelete(id, title) {
        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to delete "${title}". This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            background: '#0B132B',
            color: '#fff',
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#475569',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }
</script>
@endsection
