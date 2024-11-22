<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Debug: Log the user's role and roles being checked
        \Log::info('User role_id: ' . ($user->role_id ?? 'null'));
        \Log::info('Roles required: ' . json_encode($roles));

        // Check if the user has one of the specified roles
        if (!$user || !in_array($user->role_id, $roles)) {
            return redirect()->route('login.show')->withErrors('Unauthorized access');
        }

        return $next($request);
    }
}
