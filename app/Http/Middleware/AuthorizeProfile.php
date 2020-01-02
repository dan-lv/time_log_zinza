<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthorizeProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentUserId = Auth::user()->id;
        $roleCurrentUser = Auth::user()->role;
        
        if ($roleCurrentUser == User::IS_ADMIN) {
            return $next($request);
        }
        if ($roleCurrentUser == User::IS_USER) {
            if ($request->profile == $currentUserId) {
                return $next($request);
            } else {
                return back();
            }
        }
    }
}
