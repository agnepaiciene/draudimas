<?php

namespace App\Http\Middleware;

use App\Models\Car;
use App\Models\Owner;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VartotojasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->user() !== null) {
            if ($request->user()->type == 'admin') {
                // dd($request->user());
                return $next($request);
            } else {
                return redirect()->back();
            }
        }else{
            return redirect()->route('login');
        }
    }


}
