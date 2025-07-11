<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role_id' => 2, // User role
        ]);

        // Create admin user
        User::factory()->create([
            'name' => 'Admin Baby Care',
            'email' => 'admin@babycare.com',
            'password' => bcrypt('password'),
            'role_id' => 1, // Admin role
        ]);

        $this->call([
            KategoriSeeder::class,
            ProdukSeeder::class,
        ]);
    }
}
