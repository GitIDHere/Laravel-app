<?php

namespace App\Http\Controllers\Seller;


use App\Http\Controllers\Controller;

class OverviewController extends Controller
{
    public function __construct(){
        
    }

    public function index(){
        return view('seller.overview');
    }

}
