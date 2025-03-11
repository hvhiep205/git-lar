<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // xoa du lieu product vi co rang buoc
        DB::table('products')->delete();
        DB::table('categories')->delete();
    
        // Xóa luôn ID cũ (nếu muốn)
        DB::statement('ALTER TABLE products AUTO_INCREMENT = 1');
        DB::statement('ALTER TABLE categories AUTO_INCREMENT = 1');

        DB::table('categories')->insert([
            [
                'name' => 'Category 1',
                'description' => 'This is category 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Category 2',
                'description' => 'This is category 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Category 3',
                'description' => 'This is category 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category 4',
                'description' => 'This is category 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category 5',
                'description' => 'This is category 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Category 6',
                'description' => 'This is category 6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category 7',
                'description' => 'This is category 7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category 8',
                'description' => 'This is category 8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category 9',
                'description' => 'This is category 9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category 10',
                'description' => 'This is category 10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}