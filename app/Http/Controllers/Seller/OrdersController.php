<?php
namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use App\Models\OutstandingOrder;
use App\Models\Seller;

class OrdersController extends Controller
{

    public function showOutstandingOrders(){

        //Need to find a way to not repeat this every time
        $seller = Seller::getSellerByUserID(Auth::user()->user_id);

        $outstandingOrders = $seller->outstandingOrder()->with('product')->get();

        return view('seller.orders.outstanding')
                    ->with('outstandingOrders', $outstandingOrders);
    }


    public function showOutstandingOrder(OutstandingOrder $order){


        return view('seller.orders.order')->with('order', $order);
    }












}
