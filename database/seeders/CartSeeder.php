<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
            'CartID' => 1,
            'ItemID' => 'RC02',
            'quantity' => 2
        ]);

        DB::table('carts')->insert([
            'CartID' => 1,
            'ItemID' => 'RC05',
            'quantity' => 4
        ]);

        DB::table('carts')->insert([
            'CartID' => 1,
            'ItemID' => 'RC03',
            'quantity' => 2
        ]);

        DB::table('carts')->insert([
            'CartID' => 1,
            'ItemID' => 'RC06',
            'quantity' => 1
        ]);
        DB::table('carts')->insert([
            'CartID' => 2,
            'ItemID' => 'RC06',
            'quantity' => 1
        ]);
    }
}
