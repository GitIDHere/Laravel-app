<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __construct(){
        $this->middleware('seller');
    }

    public function index(){
        return view('main_pages.seller.seller-overview');
    }

}
