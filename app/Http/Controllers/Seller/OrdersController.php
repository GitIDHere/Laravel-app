<?php
namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use App\Models\OutstandingOrders;
use App\Models\Seller;

class OrdersController extends Controller
{

    public function showOutstandingOrders(){

        $seller = Seller::getSellerByUserID(Auth::user()->user_id);

        $outstandingOrders = $seller->outstandingOrders()->with('product')->get();

        return view('seller.orders.outstanding')
                    ->with('outstandingOrders', $outstandingOrders);
    }

    












}
