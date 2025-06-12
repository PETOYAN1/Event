<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User_settings;
use App\Models\Event;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User_settings::factory(10)->create();
        Event::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
        ]);
    }

}
