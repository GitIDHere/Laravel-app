<?php
namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterSeller;

class RegistrationController extends Controller
{

    public function create(){
        return view('seller.register');
    }


    public function store(RegisterSeller $request){

        

        flash()->overlay('Registration successful', 'You have successfully been registered as a seller');

        return redirect()->route('seller-dashboard');
    }

}
