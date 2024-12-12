<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $demoPegawai = Pegawai::create([
            'nama'  => $faker->name,
            'nip_lama'  => $faker->randomNumber(9, true),
            'nip_baru'  => $faker->randomNumber(9, true) . $faker->randomNumber(9, true),
            'nik'  => $faker->randomNumber(8, true) . $faker->randomNumber(8, true),
            'golongan' => 'III/a',
            'pangkat' => 'Penata Muda',
            'jabatan' => 'Statistisi Ahli Pertama',
            'email' => $faker->email,
        ]);

        $demoPegawai2 = Pegawai::create([
            'nama'  => $faker->name,
            'nip_lama'  => $faker->randomNumber(9, true),
            'nip_baru'  => $faker->randomNumber(9, true) . $faker->randomNumber(9, true),
            'nik'  => $faker->randomNumber(8, true) . $faker->randomNumber(8, true),
            'golongan' => 'III/a',
            'pangkat' => 'Penata Muda',
            'jabatan' => 'Statistisi Ahli Pertama',
            'email' => $faker->email,
        ]);
        $demoPegawai3 = Pegawai::create([
            'nama'  => $faker->name,
            'nip_lama'  => $faker->randomNumber(9, true),
            'nip_baru'  => $faker->randomNumber(9, true) . $faker->randomNumber(9, true),
            'nik'  => $faker->randomNumber(8, true) . $faker->randomNumber(8, true),
            'golongan' => 'III/c',
            'pangkat' => 'Penata Muda',
            'jabatan' => 'Statistisi Ahli Muda',
            'email' => $faker->email,
        ]);
        $demoPegawai4 = Pegawai::create([
            'nama'  => $faker->name,
            'nip_lama'  => $faker->randomNumber(9, true),
            'nip_baru'  => $faker->randomNumber(9, true) . $faker->randomNumber(9, true),
            'nik'  => $faker->randomNumber(8, true) . $faker->randomNumber(8, true),
            'golongan' => 'III/a',
            'pangkat' => 'Penata Muda',
            'jabatan' => 'Prakom Ahli Pertama',
            'email' => $faker->email,
        ]);
    }
}
