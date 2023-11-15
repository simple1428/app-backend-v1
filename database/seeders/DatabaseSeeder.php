<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        \App\Models\User::create([
            'name' => 'Misbah',
            'email' => 'misbahudin1428@gmail.com',
            'phone' => '089619080300',
            'bio' =>'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, illo.',
            'role' => 'admin',
            'password' => bcrypt('A7051892b'),
            'email_verified_at' => now(),
        ]);
    }
}