<?php

namespace Database\Seeders;

use App\Models\Resort;
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
        \App\Models\User::factory(5)->create();
        Resort::factory()
        ->count(100)
        ->hasBookings(3)
        ->create();
       
    }
}
