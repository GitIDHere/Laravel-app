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


        $user1 = User::create([
          'name' => 'John Doe',
          'email' => 'john@doe.com',
          'password' => Hash::make('qqqqqq')
        ]);

        $user2 = User::create([
          'name' => 'Samir Vora',
          'email' => 'samsurfs@gmail.com',
          'password' => Hash::make('qqqqqq')
        ]);

        $user3 = User::create([
          'name' => 'Samir Vora',
          'email' => 'sosolid1236@gmail.com',
          'password' => Hash::make('qqqqqq')
        ]);





        $seller1 = $user1->seller()->create([
            'company_name' => "John's Shop",
            'company_email' => 'john@company.com'
        ]);

        $seller2 = $user2->seller()->create([
            'company_name' => "Samir's Shop",
            'company_email' => 'samir@company.com'
        ]);




        $seller1->products()->create([
            'product_title' => "Acrylic Dragonball Replica Ball (Large/4 Stars) Large Size 7CM by Yao Design Large Size 7CM by Yao Design Large Size 7CM by Yao Design",
            'category_id' => 1,
            'product_price' => 900,
            'stock_amount' => 500,
            'delivery_cost' => 135,
            'short_description' => "It's like the Eternal Dragon is about to comes down to make your wish!!",
            'full_description' => "The Dragonball itself is really great - it has a nice size and weight to it, and you can barely see the line that joins the two halves together )which I was a little concerned about) This was intended as a gift, but the reason I didn't give five stars was that I felt the presentation in the box was a bit of a let down. The outside had a cool design all over it (it got dented in the post, but that's not anyone's fault) but on the inside there was only a square of scruffy yellow fabric that was not even glued down and there was nothing to stop the ball from rattling around.",
        ]);

        $seller1->products()->create([
            'product_title' => "Sonic Mania Collectors Edition (PS4)",
            'category_id' => 2,
            'product_price' => 8000,
            'stock_amount' => 5,
            'delivery_cost' => 0,
            'short_description' => "Deluxe \"SEGA Mega Drive\" style Collector's Box, 12\" Classic Sonic Statue featuring SEGA Mega Drive Base, Metallic Collector's Card plus Sonic Mania Download Code (digital game code), SEGA Cartridge Cast with Golden Ring",
            'full_description' => "THE CLASSIC SONIC EXPERIENCE RETURNS WITH BRAND NEW TWISTS 2D Sonic is back in an all-new adventure! Play as Sonic, Tails, & Knuckles as you race through all-new Zones and fully re-imagined classics, each filled with exciting surprises and powerful bosses. Harness Sonic's new Drop Dash, Tails' flight, and Knuckles' climbing abilities to overcome the evil Dr. Eggman's robots. Discover a myriad of never-before-seen hidden paths and secrets! This all-new experience celebrates the best of Classic Sonic, pushing the envelope forward with stunning 60 FPS gameplay and pixel-perfect physics. Welcome to the next level for the world's fastest blue hedgehog. Welcome to Sonic Mania. CLASSIC SONIC RETURNS IN AN All-NEW 2D ADVENTURE THREE PLAYABLE CHARACTERS ALL-NEW LEVELS AND FULLY RE-IMAGINED CLASSICS BEAUTIFUL PIXEL GRAPHICS AT 60 FPS AVAILABLE SPRING 2017 ON PLAYSTATION 4 & XBOX ONE.",
        ]);

        // Need to consider PREORDERS
        // Perhaps give them a tick box to tell it's not been released
        // escape strings
        // free delivery tickbox?

        $seller2->products()->create([
            'product_title' => "zz",
            'category_id' => 3,
            'product_price' => 8000,
            'stock_amount' => 5,
            'delivery_cost' => 0,
            'short_description' => "2sd sds sd s dsdds ds",
            'full_description' => "sds sd sdds d s  sd sd dss dsd sff dfd fd fdf df df dfd df",
        ]);

    }
}
