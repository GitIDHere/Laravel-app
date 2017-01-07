<?php

namespace App\Http\Controllers\Seller;


use Illuminate\Routing\Controller;

class OverviewController extends Controller
{
    public function __construct(){
        $this->middleware('seller');
    }
    
    public function index(){
        return view('main_pages.seller.overview');
    }

}
