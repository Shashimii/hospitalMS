<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient' => fake()->name(),
            'diagnosis' => fake()->sentence(),
            'doctor' => fake()->name(),
            'date' => fake()->date('d/m/Y'),
            'doctor_id' => fake()->numberBetween(1, 100),
            'patient_id' => fake()->numberBetween(1, 100),
        ];
    }
}
