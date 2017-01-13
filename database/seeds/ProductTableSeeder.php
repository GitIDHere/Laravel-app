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
        DB::table('sellers')->delete();
        DB::table('products')->delete();
        DB::table('outstanding_orders')->delete();

        //$emails = ['john@doe.com', 'jane@doe.com', 'jim@jones.com'];

        $faker = Faker\Factory::create();

        $users = factory(App\Models\User::class, 3)->create();

        $users->each(function($user, $key) use ($faker){

            //Only make the first and last users sellers
            if($key == 0 || $key == 2){

                //$seller = $user->seller()->save(factory(App\Models\Seller::class)->make());
                $seller = $user->seller()->create([
                    'seller_name' => $user->name,
                    'company_name' => $faker->company,
                    'company_email' => $faker->companyEmail
                ]);

                //Seller address
                $seller->address()->save(factory(App\Models\SellerAddress::class)->make());

                //Seller products
                $products = factory(App\Models\Product::class, 2)->make();

                $products->each(function($product) use ($seller, $faker) {

                    $seller->products()->save($product);

                    $orderQuantity = $faker->numberBetween(1, 10);

                    $seller->outstandingOrder()->create([
                        'product_id' => $product->product_id,
                        'product_title' => $product->product_title,
                        'quantity' => $orderQuantity,
                        'product_price' => $product->product_price,
                        'total_price' => ($product->product_price * $orderQuantity)
                    ]);

                });


            }

        });

    }
}
