<?php

use Illuminate\Database\Seeder;
use App\Product;
use Faker\Generator as Faker;
use App\Category;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
            $newProduct = new Product;

            $randomCategory = Category::inRandomOrder()->first();

            $newProduct->name = $faker->sentence(4);
            $newProduct->description = $faker->text();
            $newProduct->category_id = $randomCategory->id;
            $newProduct->serial_number = $faker->swiftBicNumber();

            $newProduct->save();


        }
    }
}
