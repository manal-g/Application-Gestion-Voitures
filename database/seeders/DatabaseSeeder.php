<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
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
        User::factory()->create([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        User::factory(10)->create();

        // Car::factory(10)->create();
    }
}
