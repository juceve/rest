<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(RolSeeder::class);
        
        \App\Models\User::factory()->create([
            'name' => 'Julio Veliz',
            'email' => 'julio@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('SuperAdmin');

        
    }
}
