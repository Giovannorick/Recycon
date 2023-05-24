<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'ItemID' => 'RC01',
            'name' => 'ULSTO',
            'price' => 100000,
            'description' => 'This is about the Product Description',
            'image' => 'Prod1.jpg',
            'category' => 'Recycle'
        ]);

        DB::table('products')->insert([
            'ItemID' => 'RC02',
            'name' => 'Charlie Chair',
            'price' => 150000,
            'description' => 'This is about the Product Description',
            'image' => 'Prod2.jpg',
            'category' => 'Second'
        ]);

        DB::table('products')->insert([
            'ItemID' => 'RC03',
            'name' => 'Suckors',
            'price' => 50000,
            'description' => 'This is about the Product Description',
            'image' => 'Prod3.jpg',
            'category' => 'Recycle'
        ]);

        DB::table('products')->insert([
            'ItemID' => 'RC04',
            'name' => 'Repack',
            'price' => 80000,
            'description' => 'This is about the Product Description',
            'image' => 'Prod4.jpg',
            'category' => 'Recycle'
        ]);

        DB::table('products')->insert([
            'ItemID' => 'RC05',
            'name' => 'Kegler',
            'price' => 120000,
            'description' => 'This is about the Product Description',
            'image' => 'Prod5.jpg',
            'category' => 'Second'
        ]);

        DB::table('products')->insert([
            'ItemID' => 'RC06',
            'name' => 'Knarzie',
            'price' => 30000,
            'description' => 'This is about the Product Description',
            'image' => 'Prod6.jpg',
            'category' => 'Second'
        ]);

        DB::table('products')->insert([
            'ItemID' => 'RC07',
            'name' => 'Belyier',
            'price' => 220000,
            'description' => 'This is about the Product Description',
            'image' => 'Prod7.jpg',
            'category' => 'Recycle'
        ]);
    }
}
