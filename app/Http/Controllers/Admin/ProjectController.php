<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'description' => 'required|string',
            'tech_stack' => 'required|string', // Comma separated tags e.g. "Laravel, Tailwind, Alpine"
            'live_demo' => 'nullable|url',
            'github' => 'nullable|url',
            'plans' => 'nullable|string', // JSON string from form
            'images' => 'nullable|array', // Slider images
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
        ]);

        // Process tech stack tags from comma-separated string to array
        $techStackArray = array_filter(array_map('trim', explode(',', $validated['tech_stack'])));

        // Process plans JSON
        $plansArray = [];
        if (!empty($validated['plans'])) {
            $plansArray = json_decode($validated['plans'], true);
            if (!is_array($plansArray)) {
                $plansArray = [];
            }
        }

        // Handle Image Upload
        if ($request->hasFile('thumbnail')) {
            // Store in storage/app/public/projects
            $path = $request->file('thumbnail')->store('projects', 'public');
            $validated['thumbnail'] = $path;
        }

        // Handle Gallery Slider Images
        $sliderImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('projects', 'public');
                $sliderImages[] = $path;
            }
        }

        // Create Project
        Project::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'thumbnail' => $validated['thumbnail'],
            'description' => $validated['description'],
            'tech_stack' => $techStackArray,
            'live_demo' => $validated['live_demo'],
            'github' => $validated['github'],
            'plans' => $plansArray,
            'images' => $sliderImages,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // Convert the tech stack array back to comma-separated string for the form
        $techStackString = implode(', ', $project->tech_stack ?? []);

        // Pre-format features for the plans widget
        $plans = array_map(function($plan) {
            $plan['features_input'] = implode(', ', $plan['features'] ?? []);
            return $plan;
        }, $project->plans ?? []);

        return view('admin.projects.edit', compact('project', 'techStackString', 'plans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'description' => 'required|string',
            'tech_stack' => 'required|string',
            'live_demo' => 'nullable|url',
            'github' => 'nullable|url',
            'plans' => 'nullable|string', // JSON string from form
            'images' => 'nullable|array', // New slider images
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'existing_images' => 'nullable|array', // Kept images
            'existing_images.*' => 'string',
        ]);

        // Process tech stack tags
        $techStackArray = array_filter(array_map('trim', explode(',', $validated['tech_stack'])));

        // Process plans JSON
        $plansArray = [];
        if (!empty($validated['plans'])) {
            $plansArray = json_decode($validated['plans'], true);
            if (!is_array($plansArray)) {
                $plansArray = [];
            }
        }

        // Handle Image Update
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
                Storage::disk('public')->delete($project->thumbnail);
            }

            // Store new thumbnail
            $path = $request->file('thumbnail')->store('projects', 'public');
            $project->thumbnail = $path;
        }

        // Handle Gallery Slider Images reconciliation
        $keptImages = $request->input('existing_images', []);

        // Delete removed images from storage
        $oldImages = $project->images ?? [];
        $deletedImages = array_diff($oldImages, $keptImages);
        foreach ($deletedImages as $deletedImage) {
            if ($deletedImage && Storage::disk('public')->exists($deletedImage)) {
                Storage::disk('public')->delete($deletedImage);
            }
        }

        // Upload new images and merge
        $newImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('projects', 'public');
                $newImages[] = $path;
            }
        }

        $allImages = array_merge($keptImages, $newImages);

        // Update other attributes
        $project->update([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'thumbnail' => $project->thumbnail,
            'description' => $validated['description'],
            'tech_stack' => $techStackArray,
            'live_demo' => $validated['live_demo'],
            'github' => $validated['github'],
            'plans' => $plansArray,
            'images' => $allImages,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete image thumbnail file from disk
        if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
            Storage::disk('public')->delete($project->thumbnail);
        }

        // Delete gallery slider images from disk
        foreach ($project->images ?? [] as $sliderImage) {
            if ($sliderImage && Storage::disk('public')->exists($sliderImage)) {
                Storage::disk('public')->delete($sliderImage);
            }
        }

        // Delete database record
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
