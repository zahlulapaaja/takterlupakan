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

        // $demoUser1 = User::create([
        //     'name'  => 'Rudi Hermanto',
        //     'email' => 'rhermanto@bps.go.id',
        //     'password' => Hash::make('acehbarat'),
        //     'email_verified_at' => now(),
        // ])->assignRole('kepala');

        // $demoUser2 = User::create([
        //     'name'  => 'T. Ariansyah',
        //     'email' => 'ariansyah@bps.go.id',
        //     'password' => Hash::make('acehbarat'),
        //     'email_verified_at' => now(),
        // ])->assignRole('pegawai');

        // $demoUser3 = User::create([
        //     'name'  => 'Firmansyah',
        //     'email' => 'firmans@bps.go.id',
        //     'password' => Hash::make('acehbarat'),
        //     'email_verified_at' => now(),
        // ])->assignRole('pegawai');

        // $demoUser4 = User::create([
        //     'name'  => 'Dhia Ulfakhirah',
        //     'email' => 'dhia.ulfakhirah@bps.go.id',
        //     'password' => Hash::make('acehbarat'),
        //     'email_verified_at' => now(),
        // ])->assignRole('pegawai');

        // $demoUser5 = User::create([
        //     'name'  => 'Afriyani',
        //     'email' => 'afriyani@bps.go.id',
        //     'password' => Hash::make('acehbarat'),
        //     'email_verified_at' => now(),
        // ])->assignRole('pegawai');

        // $demoUser6 = User::create([
        //     'name'  => 'Gharisa Nur Fitri',
        //     'email' => 'gharisa.nur@bps.go.id',
        //     'password' => Hash::make('acehbarat'),
        //     'email_verified_at' => now(),
        // ])->assignRole('pegawai');

        // $demoUser7 = User::create([
        //     'name'  => 'Muhammad Apriesya Wastu Nirbhaya',
        //     'email' => 'apriesya.wastu@bps.go.id',
        //     'password' => Hash::make('acehbarat'),
        //     'email_verified_at' => now(),
        // ])->assignRole('pegawai');

        // $demoUser8 = User::create([
        //     'name'  => 'Tika Widya Wardani',
        //     'email' => 'tika.widya@bps.go.id',
        //     'password' => Hash::make('acehbarat'),
        //     'email_verified_at' => now(),
        // ])->assignRole('pegawai');

        $demoUser9 = User::create([
            'name'  => 'Salsabila Ainayafani',
            'email' => 'salsabila.ainaya@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser10 = User::create([
            'name'  => 'T. Hamdani',
            'email' => 'thamdani@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser11 = User::create([
            'name'  => 'Darwis',
            'email' => 'darwis@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser12 = User::create([
            'name'  => 'Riniwati',
            'email' => 'riniwati@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser13 = User::create([
            'name'  => 'M. Nazaruddin Z.',
            'email' => 'nazaruddin@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser14 = User::create([
            'name'  => 'Safriadi',
            'email' => 'safriadi@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser15 = User::create([
            'name'  => 'Lisnadiani',
            'email' => 'lisnadiani@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser16 = User::create([
            'name'  => 'Muhammad Khumaidi',
            'email' => 'muh.khumaidi@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser17 = User::create([
            'name'  => 'Haris Yusuf',
            'email' => 'haris.yusuf@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser18 = User::create([
            'name'  => 'Ayu Aina Nurkhaliza',
            'email' => 'ayuainaa@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser19 = User::create([
            'name'  => 'Zahlul Fuadi',
            'email' => 'zahlul.fuadi@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser20 = User::create([
            'name'  => 'Yulia Geubrina',
            'email' => 'yuliageubrina@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');

        $demoUser21 = User::create([
            'name'  => 'Titiek Zuriyati',
            'email' => 'titiek@bps.go.id',
            'password' => Hash::make('acehbarat'),
            'email_verified_at' => now(),
        ])->assignRole('pegawai');
    }
}
