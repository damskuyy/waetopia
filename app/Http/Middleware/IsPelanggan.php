<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsPelanggan
{
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('pelanggan')->user();
        if ($user && $user->level === 'pelanggan') {
            return $next($request);
        }
        return redirect()->route('auth_fe.login')->with('error', 'Anda tidak memiliki akses.');
    }
}