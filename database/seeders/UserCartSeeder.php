<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_carts')->insert([
            'UserID' => 2,
        ]);
        DB::table('user_carts')->insert([
            'UserID' => 3,
        ]);
    }
}
