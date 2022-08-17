<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = auth()->user();

        if (!$user || $user->role !== User::ROLE_ADMIN) {
            abort(404);
        }

        return $next($request);
    }
}
