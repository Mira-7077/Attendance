<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

// class RoleMiddleware
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
  
    
//         public function handle($request, Closure $next, $role)
// {
//     if (!auth()->check()) {
//         return redirect()->route('login');
//     }

//     if (auth()->user()->role->name !== $role) {
//         abort(403);
//     }

//     return $next($request);
// }

//     }




// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;

// class RoleMiddleware
// {
//     public function handle(Request $request, Closure $next, ...$roles)
//     {
//         if (!auth()->check()) {
//             return redirect()->route('login');
//         }

//         if (!in_array(auth()->user()->role->name, $roles)) {
//             abort(403);
//         }

//         return $next($request);
//     }
// }




namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Admin check
        if ($role === 'admin' && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized.');
        }

        // Role check for teacher/student
        if ($role !== 'admin' && auth()->user()->role->name !== $role) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
