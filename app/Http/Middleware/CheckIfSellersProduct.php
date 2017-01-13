<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Seller;
use App\Models\Product;

class CheckIfSellersProduct
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
        $seller = Seller::getSellerByUserID($request->user()->user_id);

        //Check if product belongs to the seller
        if($seller->products()->find($request->product->product_id)){
            return $next($request);
        }

        return redirect()->route('seller-all-products');
    }



























}
