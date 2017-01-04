<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->delete();

      $categories = [
             'Baby',
             'Beauty',
             'Books',
             'Car',
             'Clothing',
             'Computers',
             'Electronics'
        ];
        
      for ($i=0; $i < count($categories); $i++) {
        Category::create([
          'title' => $categories[$i]
        ]);
      }

    }

}
