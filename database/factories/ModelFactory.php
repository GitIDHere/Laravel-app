<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('qqqqqq'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Models\Seller::class, function (Faker\Generator $faker) {
    return [
        'seller_name' => $faker->name,
        'company_name' => $faker->company,
        'company_email' => $faker->companyEmail
    ];
});



$factory->define(App\Models\SellerAddress::class, function (Faker\Generator $faker) {
    return [
        'address_line_1' => $faker->streetAddress,
        'address_line_2' => $faker->streetName,
        'city' => $faker->city,
        'postcode' => $faker->postcode
    ];
});



$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'category_id' => $faker->numberBetween(1, 7),
        'product_title' => $faker->word,
        'product_price' => $faker->randomFloat(2, 1, 100),
        'stock_amount' => $faker->numberBetween(1, 500),
        'delivery_cost' => $faker->randomFloat(2, 1, 300),
        'short_description' => $faker->sentence(12),
        'full_description' => $faker->paragraph
    ];
});



// $factory->define(App\Models\OutstandingOrders::class, function (Faker\Generator $faker) {
//     return [
//         'product_id' => ,
//         'seller_id' => ,
//         'product_title' => ,
//         'quantity' => ,
//         'product_price' => 
//     ];
// });
