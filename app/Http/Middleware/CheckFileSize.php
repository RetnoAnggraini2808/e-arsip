<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckFileSize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $maxSizeInBytes = 2 * 1024 * 1024; // Maksimum 2 MB
        
        if ($request->server('CONTENT_LENGTH') > $maxSizeInBytes) {
            return redirect()->back()->with('error', 'Ukuran file terlalu besar, maksimum 2 MB.');
        }

        return $next($request);
    }
}
