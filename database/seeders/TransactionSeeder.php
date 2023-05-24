<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'UserID' => 2,
            'name' => 'Justin',
            'address' => 'Avena & Justin Home Address',
        ]); 

        DB::table('transactions')->insert([
            'UserID' => 2,
            'name' => 'Avena',
            'address' => 'Avena & Justin Home Address',
        ]); 

        DB::table('transactions')->insert([
            'UserID' => 3,
            'name' => 'Albert',
            'address' => 'Albert Home Address',
        ]); 
    }
}
