<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        
        if ($user->is_admin) {
            return $next($request);
        }

        
        if (in_array($user->role->name, $roles)) {
            return $next($request);
        }

        abort(403, 'Unauthorized.');
    }
}
