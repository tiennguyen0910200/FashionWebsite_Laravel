<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<5; $i++){
            DB::table('products')->insert([
                "name"=>$faker->name,
                // "category_id"=>$faker->numberBetween(1,2),
                "category_id"=>1,
                "image"=>"/storage/public/i3bx6p99bBrfO7DgcDM8ZNRyNZHZ7kJDhogLaaLi.jpeg",
                "price"=>$faker->numberBetween($min = 1000, $max = 9000),
                "oldPrice"=>$faker->numberBetween($min = 1000, $max = 9000),
                "quantity"=>$faker->numberBetween(1,50),
                "description"=>$faker->text,
 
            ]);
            }
            for($i=0; $i<5; $i++){
                DB::table('products')->insert([
                    "name"=>$faker->name,
                    // "category_id"=>$faker->numberBetween(1,2),
                    "category_id"=>2,
                    "image"=>"/storage/public/B0eCn6FPK2PTWljYjyNuLvgTpL5Nq5ajlrpGwD51.jpeg",
                    "price"=>$faker->numberBetween($min = 1000, $max = 9000),
                    "oldPrice"=>$faker->numberBetween($min = 1000, $max = 9000),
                    "quantity"=>$faker->numberBetween(1,50),
                    "description"=>$faker->text,
    
                ]);
                }

    }
}
