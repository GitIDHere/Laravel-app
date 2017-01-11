<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;

class SellerAuthenticated
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
        
        if(Seller::where('user_id', Auth::user()->user_id)->first()){
            return $next($request);
        }

        return redirect()->route('seller-register');
    }
}
