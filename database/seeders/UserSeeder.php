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
        // $demoUser = User::create([
        //     'name'  => $faker->name,
        //     'email' => 'admin@dummy.com',
        //     'password' => Hash::make('admin123'),
        //     'email_verified_at' => now(),
        // ]);

        // $demoUser2 = User::create([
        //     'name'  => $faker->name,
        //     'email' => 'demo@dummy.com',
        //     'password' => Hash::make('demo123'),
        //     'email_verified_at' => now(),
        // ]);

        // $demoUser3 = User::create([
        //     'name'  => $faker->name,
        //     'email' => 'pegawai@dummy.com',
        //     'password' => Hash::make('pegawai123'),
        //     'email_verified_at' => now(),
        // ]);

        // $demoUser4 = User::create([
        //     'name'  => $faker->name,
        //     'email' => 'trial@dummy.com',
        //     'password' => Hash::make('trial123'),
        //     'email_verified_at' => now(),
        // ]);

        $demoUser5 = User::create([
            'name'  => 'Rudi Hermanto',
            'email' => 'rhermanto@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('kepala');

        $demoUser5 = User::create([
            'name'  => 'T. Ariansyah',
            'email' => 'ariansyah@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser5 = User::create([
            'name'  => 'Firmansyah',
            'email' => 'firmans@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser5 = User::create([
            'name'  => 'Dhia Ulfakhirah',
            'email' => 'dhia.ulfakhirah@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser5 = User::create([
            'name'  => 'Afriyani',
            'email' => 'afriyani@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser5 = User::create([
            'name'  => 'Gharisa Nur Fitri',
            'email' => 'gharisa.nur@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser5 = User::create([
            'name'  => 'Muhammad Apriesya Wastu Nirbhaya',
            'email' => 'apriesya.wastu@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser5 = User::create([
            'name'  => 'Tika Widya Wardani',
            'email' => 'tika.widya@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');
    }
}
