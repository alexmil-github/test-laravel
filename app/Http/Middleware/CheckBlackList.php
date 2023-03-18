<?php

namespace App\Http\Middleware;

use App\Models\BlackList;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBlackList
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
        $is_blacklist = BlackList::where([
           'user_id' => Auth::user()->id
        ])->first();

        if ($is_blacklist) {
            return response()->json([
                'error' => [
                    'code' => 403,
                    'message' => 'Forbidden for you. You are banned by Admin'
                ]
            ], 403);
        }


        return $next($request);

    }
}
