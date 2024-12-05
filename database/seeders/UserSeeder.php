<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $demoUser = User::create([
            'name'  => $faker->name,
            'email' => 'admin@dummy.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        $demoUser2 = User::create([
            'name'  => $faker->name,
            'email' => 'demo@dummy.com',
            'password' => Hash::make('demo123'),
            'email_verified_at' => now(),
        ]);

        $demoUser3 = User::create([
            'name'  => $faker->name,
            'email' => 'pegawai@dummy.com',
            'password' => Hash::make('pegawai123'),
            'email_verified_at' => now(),
        ]);

        $demoUser4 = User::create([
            'name'  => $faker->name,
            'email' => 'trial@dummy.com',
            'password' => Hash::make('trial123'),
            'email_verified_at' => now(),
        ]);
    }
}
