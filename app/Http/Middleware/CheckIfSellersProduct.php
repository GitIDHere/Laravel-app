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
        $userID = $request->user()->user_id;

        //Get seller id from
        $sellerID = $this->seller->getSellerID($userID);

        //get the product id from the URL
        $productID = $request->inventory;

        //Check if product belongs to the seller
        if(($this->product->where(['seller_id' => $sellerID, 'product_id' => $productID])->first())){
           return $next($request);
        }

        return redirect('/inventory');
    }
}
