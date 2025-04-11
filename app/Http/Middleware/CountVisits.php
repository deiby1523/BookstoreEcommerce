<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

        $existing = Visit::where('ip_address', request()->ip())
            ->where('page', $request->path())
            ->where('created_at', '>=', now()->subMinutes(1439))
            ->exists();

        if (!$existing) {
            Visit::create([
                'page' => $request->path(),
                'ip_address' => $request->ip(),
            ]);
        }

        return $next($request);
    }
}
