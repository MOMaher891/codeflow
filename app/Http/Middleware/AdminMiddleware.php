<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('admin_logged_in') || session()->get('admin_logged_in') !== true) {
            return redirect()->route('admin.login')->withErrors([
                'email' => 'Please log in to access the Admin Dashboard.',
            ]);
        }

        return $next($request);
    }
}
