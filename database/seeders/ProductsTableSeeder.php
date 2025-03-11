<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $categoryID = DB::table('categories')->pluck('id')->toArray();

        // DB::table('products')->insert([
        //     [
        //         'name' => Str::random(10),
        //         'price' => 10000,
        //         'image' => 'https://via.placeholder.com/150',
        //         'cate_id' => $categoryID[array_rand($categoryID)],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],

        //     [
        //         'name' => Str::random(10),
        //         'price' => 20000,
        //         'image' => 'https://via.placeholder.com/150',
        //         'cate_id' => $categoryID[array_rand($categoryID)],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]
        // ]);    
        $faker = Faker::create();
        $categoryIDs = DB::table('categories')->pluck('id')->toArray();
        
        if (empty($categoryIDs)) {
            $this->command->info("No categories found. Please seed categories first.");
            return;
        }
        
        $products = [];

        foreach (range(1, 100) as $index) { 
            $products[] = [
                'name' => $faker->word . '-' . $index, 
                'price' => $faker->numberBetween(10000, 99999),
                'image' => $faker->imageUrl(200, 200, 'products'),
                'cate_id' => $faker->randomElement($categoryIDs),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($products);
    }
}