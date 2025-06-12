<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::create([
            'full_name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'), 
        ]);
        $admin->assignRole('supervisor');
    }
}
