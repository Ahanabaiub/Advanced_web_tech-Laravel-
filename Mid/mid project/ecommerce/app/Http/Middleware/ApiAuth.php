<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\auth_token;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header("Authorization");
        $check_token = auth_token::where('token',$token)->where('expired_at',NULL)->first();
        if ($check_token) {
            return $next($request);
            
        }
        else return response("Invalid token",401);
    }
}
