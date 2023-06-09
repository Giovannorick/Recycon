<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([TransactionSeeder::class]);
        $this->call([UserCartSeeder::class]);
        $this->call([DetailSeeder::class]);
        $this->call([CartSeeder::class]);

    }
}
