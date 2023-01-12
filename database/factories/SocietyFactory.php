<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SocietyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nik' => fake()->unique()->nik(),
            'fullname' => fake()->name(),
            // 'photo' => fake()->image(null, 480, 640, null, true, true, null, true),
            'photo' => fake()->imageUrl(480, 640, null, true, null, true),
            'gender' => fake()->sex(),
            'pob' => fake()->city(),
            'dob' => fake()->date(),
            'address' => fake()->address(),
            'religion' => fake()->religion(),
            'marital_status' => fake()->marriedStatus(),
            'profession' => fake()->jobTitle(),
            'nationality' => fake()->negara()
        ];
    }
}
