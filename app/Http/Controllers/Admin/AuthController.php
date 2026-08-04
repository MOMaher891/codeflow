<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLogin()
    {
        if (session()->get('admin_logged_in') === true) {
            return redirect()->route('admin.projects.index');
        }
        return view('admin.login');
    }

    /**
     * Handle admin authentication.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $adminEmail = env('ADMIN_EMAIL', 'admin@codeflow.com');
        $adminPassword = env('ADMIN_PASSWORD', 'adminpassword123');

        if ($credentials['email'] === $adminEmail && $credentials['password'] === $adminPassword) {
            session()->put('admin_logged_in', true);
            session()->regenerate();
            return redirect()->route('admin.projects.index')->with('success', 'Welcome back, Administrator!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Log the admin out.
     */
    public function logout()
    {
        session()->forget('admin_logged_in');
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}
