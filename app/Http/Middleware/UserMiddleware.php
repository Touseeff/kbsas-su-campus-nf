<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return $next($request);
        } else {
            // return response()->json(['error' => 'Validation failed.'], 400);
            return redirect()->route('login.form')->with(['AuthMessage' => "Please first login"]);
        }

    }




    // public function handle(Request $request, Closure $next, String $roleType): Response
    // {
    //     if(Auth::check() && Auth::user()->roleType == 'user'){
    //         return view('back-end.show');
    //     }
    //     else{
    //         return $next($request);
    //         // return view('front-end.404');
    //     }
    // }
}
