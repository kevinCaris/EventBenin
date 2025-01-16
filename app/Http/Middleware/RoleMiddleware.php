<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role = null)
    {
            // // Vérifiez si l'utilisateur est authentifié
            // if (!auth()->check()) {
            //     // return redirect()->route('login');
            //     abort(403,'Unauthorized action.');
            // }

            // if ($role && auth()->user()->getRoleAsString() !== $role) {
            //     // return abort('403', 'Accès non autorisé.');
            //     return redirect()->route('login');
            // }

        return $next($request);
    }
}
