<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@recycon.com',
            'password' => bcrypt('Admin123'),
            'isAdmin' => true
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('User123'),
            'isAdmin' => false
        ]);

        DB::table('users')->insert([
            'name' => 'Albert',
            'email' => 'albert@gmail.com',
            'password' => bcrypt('123456'),
            'isAdmin' => false
        ]);
    }
}
