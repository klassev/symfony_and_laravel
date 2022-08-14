<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NeedTestAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->hasHeader('X-UserName') && $request->header('X-UserName') == 'admin'){
            if($request->hasHeader('X-Password')){
                $hashedPassword = Hash::make(12345);
                if(Hash::check($request->header('X-Password'), $hashedPassword)){
                    return $next($request);
                }
            }
        }
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }
}
