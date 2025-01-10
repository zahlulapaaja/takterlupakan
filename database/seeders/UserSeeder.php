<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        // $demoUser1 = User::create([
        //     'name'  => $faker->name,
        //     'email' => 'demo@dummy.com',
        //     'password' => Hash::make('demo123'),
        //     'email_verified_at' => now(),
        // ])->assignRole('administrator');

        // $demoUser2 = User::create([
        //     'name'  => $faker->name,
        //     'email' => 'pegawai@dummy.com',
        //     'password' => Hash::make('pegawai123'),
        //     'email_verified_at' => now(),
        // ])->assignRole('ppk');

        // $demoUser3 = User::create([
        //     'name'  => $faker->name,
        //     'email' => 'trial@dummy.com',
        //     'password' => Hash::make('trial123'),
        //     'email_verified_at' => now(),
        // ])->assignRole('pegawai');
    }
}
