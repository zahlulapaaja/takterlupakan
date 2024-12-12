<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'  => fake()->name(),
            'nip_lama'  => fake()->randomNumber(9, true),
            'nip_baru'  => fake()->randomNumber(18, true),
            'nik'  => fake()->randomNumber(16, true),
            'golongan' => 'III/a',
            'pangkat' => 'Penata Muda',
            'jabatan' => 'Statistisi',
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
