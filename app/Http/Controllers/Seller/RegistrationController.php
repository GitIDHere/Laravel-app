<?php
namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterSeller;

use App\Models\User;
use App\Models\Seller;

class RegistrationController extends Controller
{

    public function create(){
        return view('seller.register');
    }
    

    public function store(RegisterSeller $request){

        //The reason why I am getting a user objet first is because user_id in Seller Model is not mass fillable
        $user = User::find(Auth::user()->user_id);

        //Only the appropriate fields will get inserted
        $seller = $user->createSeller($request->all());

        $seller->createAddress($request->all());

        flash()->overlay('Registration successful', 'You have successfully been registered as a seller');

        return redirect()->route('seller-overview');
    }

}
