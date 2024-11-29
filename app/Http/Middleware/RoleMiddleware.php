<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Periksa apakah pengguna sudah login
        if (!Auth::check()) {
            $this->logUnauthorizedAttempt($request, 'Unauthenticated');
            return $this->unauthorized('Silakan login terlebih dahulu');
        }

        // Ambil peran pengguna saat ini
        $user = Auth::user();
        $userRole = $user->role;

        // Periksa apakah peran pengguna cocok dengan peran yang diizinkan
        if (!in_array($userRole, $roles)) {
            $this->logUnauthorizedAttempt($request, 'Unauthorized role access');
            return $this->unauthorized('Anda tidak memiliki izin untuk mengakses halaman ini');
        }

        return $next($request);
    }

    /**
     * Log unauthorized access attempts
     *
     * @param \Illuminate\Http\Request $request
     * @param string $reason
     */
    protected function logUnauthorizedAttempt($request, $reason)
    {
        Log::warning('Unauthorized access attempt', [
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
            'user_id' => Auth::check() ? Auth::id() : 'Guest',
            'reason' => $reason
        ]);
    }

    /**
     * Handle unauthorized access
     *
     * @param string $message
     * @return \Illuminate\Http\Response
     */
    protected function unauthorized($message = 'Unauthorized')
    {
        return response()->view('errors.403', [
            'message' => $message
        ], 403);
    }
}