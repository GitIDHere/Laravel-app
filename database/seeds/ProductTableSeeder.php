<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Seller;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear our database ------------------------------------------
        DB::table('users')->delete();
        DB::table('products')->delete();
        DB::table('sellers')->delete();

        $users = factory(App\Models\User::class, 3)->create();

        $users->each(function($user, $key){

            //Only make the first and last users sellers
            if($key == 0 || $key == 2){
                $seller = $user->seller()->save(factory(App\Models\Seller::class)->make());

                //Seller address
                $seller->address()->save(factory(App\Models\SellerAddress::class)->make());

                //Seller products
                $products = factory(App\Models\Product::class, 2)->make();

                $seller->products()->save($products[0]);
                $seller->products()->save($products[1]);
            }

        });

    }
}
