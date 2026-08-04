<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display the public portfolio page.
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('portfolio', compact('projects'));
    }

    /**
     * Display a single project with details and plans.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Handle the contact form submission and redirect to WhatsApp.
     */
    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'required|string',
            'message' => 'required|string',
        ]);

        $phone = env('WHATSAPP_PHONE', '+201501036198'); // Default phone number

        // Build the text message for WhatsApp
        $text = "Hello CodeFlow!\n\n"
              . "My name is: " . $validated['name'] . "\n"
              . "Email: " . $validated['email'] . "\n"
              . "Interested Service: " . $validated['service'] . "\n\n"
              . "Message:\n" . $validated['message'];

        $url = "https://wa.me/" . preg_replace('/[^0-9]/', '', $phone) . "?text=" . urlencode($text);

        return redirect()->away($url);
    }
}
