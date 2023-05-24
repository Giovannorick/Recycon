<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->insert([
            'TransactionID' => 1,
            'ItemID' => 'RC02',
            'quantity' => 2
        ]);

        DB::table('details')->insert([
            'TransactionID' => 1,
            'ItemID' => 'RC05',
            'quantity' => 4
        ]);

        DB::table('details')->insert([
            'TransactionID' => 2,
            'ItemID' => 'RC03',
            'quantity' => 2
        ]);

        DB::table('details')->insert([
            'TransactionID' => 2,
            'ItemID' => 'RC06',
            'quantity' => 1
        ]);

        DB::table('details')->insert([
            'TransactionID' => 2,
            'ItemID' => 'RC01',
            'quantity' => 3
        ]);

        DB::table('details')->insert([
            'TransactionID' => 3,
            'ItemID' => 'RC04',
            'quantity' => 2
        ]);

        DB::table('details')->insert([
            'TransactionID' => 3,
            'ItemID' => 'RC07',
            'quantity' => 6
        ]);
    }
}
