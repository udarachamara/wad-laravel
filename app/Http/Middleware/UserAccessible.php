<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserAccessible
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
        $isAuth = Auth::guard('api')->check();

        if(!$isAuth){
            // redirect page or error.

            $code = 401;

            $output = ['code' => $code,
                'status' => false,
                'msg' => 'Unauthenticated',
                'data' => []];

            return response()->json($output, $code);
        }

        return $next($request);
    }
}