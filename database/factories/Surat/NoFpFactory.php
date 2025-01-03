<?php

namespace Database\Factories\Surat;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NoFpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no'  => sprintf("%04d", fake()->unique()->randomNumber(4, true)),
            'rincian'  => 'Surat Tentang ' . fake()->words(7, true),
            'tgl'  => fake()->dateTimeThisYear(),
            'tahun' => '2025',
            'edited_by' => '1',
        ];
    }
}
