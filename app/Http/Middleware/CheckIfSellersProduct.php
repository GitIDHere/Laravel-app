<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Seller;
use App\Models\Product;

class CheckIfSellersProduct
{

    protected $product;
    protected $seller;

    public function __construct(Seller $seller, Product $product){
        $this->product = $product;
        $this->seller = $seller;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $seller = Seller::where('user_id', $request->user()->user_id)->first();

        //Check if product belongs to the seller
        if((Product::where(['seller_id' => $seller->seller_id, 'product_id' => $request->product]))){
           return $next($request);
        }

        return redirect('/products');
    }



























}
